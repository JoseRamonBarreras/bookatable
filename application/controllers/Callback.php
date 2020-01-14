<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends Base_Controller{
	private $access_token = 'yourfacebookaccesstokenxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
	public function __construct()

	{
		parent::__construct();
		$params = array('access_token' => $this->access_token, 'verify_token' => 'bookatable_match');
		$this->load->helper(array('url'));
        $this->load->library('facebookmessenger', $params);
        $this->load->library('message');
        $this->load->library('messagetype/template');
        $this->load->library('messagetype/button');
        $this->load->library('messagetype/gallery');
		$this->load->model('menu_model');
		$this->load->model('item_model');
		$this->load->model('promo_model');
		$this->load->model('chatbot_user_model');
		
	}

    public function index(){
    	$sender = $this->facebookmessenger->getSender();
		$message = $this->facebookmessenger->getMessage();
		$payload = $this->facebookmessenger->getPayLoad();

        if(	isset($sender) && isset($message) && !isset($payload) ){	
        	$this->message_response($sender, $message);
		}
		if(	isset($sender) && isset($payload) ){
			$this->payload_response($sender, $payload);
		}
    }
    
    private function message_response($sender, $message){
    	$this->track_chat_user_report($sender);
    	
    	if ( preg_match( '/HOLA/i', strtolower($message) ) ) {
			$this->facebookmessenger->sendMessage( $sender, $this->message->text('Ey Hola! 🤗') );
		}	
		elseif ( 
				preg_match( '/MENU/i', strtolower( $message ) ) ||
				preg_match( '/MENUS/i', strtolower( $message ) ) 
		 	) 
		{
			$this->facebookmessenger->sendAction( $sender, 'mark_seen' );
			$this->facebookmessenger->sendAction( $sender, 'typing_on' );
			sleep(1);
			$this->facebookmessenger->sendMessage( $sender, $this->message->text('Da click en view more para ver los platillos de cada menu! 🤗') );
			$this->block_menus($sender);
		}
		elseif ( 
				preg_match( '/PROMO/i', strtolower( $message ) ) ||
				preg_match( '/PROMOS/i', strtolower( $message ) ) ||
				preg_match( '/PROMOCIONES/i', strtolower( $message ) ) 
		 	) 
		{
			$this->facebookmessenger->sendAction( $sender, 'mark_seen' );
			$this->facebookmessenger->sendAction( $sender, 'typing_on' );
			sleep(1);
			$this->facebookmessenger->sendMessage( $sender, $this->message->text('Tenemos las siguientes promociones! 🤗') );
			$this->block_promos($sender);
		}
		elseif ( 
				preg_match( '/HORA/i', strtolower( $message ) ) ||
				preg_match( '/HORARIO/i', strtolower( $message ) ) ||
				preg_match( '/HORARIOS/i', strtolower( $message ) ) 
		 	) 
		{
			$this->facebookmessenger->sendAction( $sender, 'mark_seen' );
			$this->facebookmessenger->sendAction( $sender, 'typing_on' );sleep(1);
			$this->facebookmessenger->sendMessage( $sender, $this->message->text('Nuestro horario es de lunes a sabado de 10:00 am a 11:00pm! 🤗') );
			$this->facebookmessenger->sendAction( $sender, 'typing_on' ); sleep(1);
			$this->facebookmessenger->sendMessage( 
				$sender, 
				$this->message->attachment( 
					'template', 
					$this->template->button(
						'Si quieres puedes reservar una mesa 👇', 
						array(
							$this->button->url_webview( base_url().'booking/book_a_table/'.$sender, 'Reservar 👆', 'full' )
						)
					)
				) 
			);
		}
		else{
			$this->facebookmessenger->sendMessage( $sender, $this->message->text('Lo siento no entendi lo que dices, puedes repetirlo') );
			$this->facebookmessenger->sendAction( $sender, 'typing_on' );sleep(1);
			$this->facebookmessenger->sendMessage( 
				$sender, 
				$this->message->attachment( 
					'template', 
					$this->template->button(
						'O si gustas puedes dar click en hablar con un asesor 👇 para una pregunta mas especifica, te responderan lo mas pronto posible.', 
						array(
							$this->button->postback('Hablar con un asesor', 'pass_thread_control')
						)
					)
				) 
			);
		}
    }

    private function payload_response($sender, $payload){
    	$this->track_chat_user_report($sender);

    	if ($payload == 'welcome_message') {
    		$user_profile = $this->facebookmessenger->getUserProfile($sender);
    		$this->save_user_data($sender, $user_profile);
    		$this->facebookmessenger->sendMessage( $sender, $this->message->text('🙂 Hola '.$user_profile['first_name'].', Bienvenido al Restaurante BookaTable!') );
			$this->block_primary_menu($sender);
		}

		if ($payload == 'primary_menu') {
			$this->block_primary_menu($sender);
		}

		if ($payload == 'block_menus') {
			$this->block_menus($sender);
		}

		$menus = $this->menu_model->all();
		foreach($menus as $menu){
			if ($payload == 'block_item_'.$menu->id) {

				$this->track_menu_report($sender, $menu->id);

				$items = $this->item_model->all_items($menu->id);
				if($items == true){
					$this->block_items($sender, $items);
				}
				else{
					$this->facebookmessenger->sendMessage( $sender, $this->message->text('Lo siento el menu: '.$menu->title.' no tiene items.') );
				}				
			}
		};

		if ($payload == 'block_promos') {
			$this->block_promos($sender);
		}

		if ($payload == 'block_reservaciones') {
			$this->facebookmessenger->sendMessage( 
				$sender, 
				$this->message->attachment( 
					'template', 
					$this->template->button(
						'A continacion da click en reservar 👇 para agendarte una mesa', 
						array(
							$this->button->url_webview( base_url().'booking/book_a_table/'.$sender, 'Reservar 👆', 'full' )
						)
					)
				) 
			);
		}

		if ($payload == 'pass_thread_control') {
			$this->facebookmessenger->sendAction( $sender, 'mark_seen' );
			$this->facebookmessenger->sendMessage( 
				$sender, 
				$this->message->attachment( 
					'template', 
					$this->template->button(
						'Por favor, dinos cuales son tus dudas y te responderemos a la brevedad posible 🙂 Muchas gracias. ', 
						array(
							$this->button->postback('Terminar Chat', 'take_thread_control')
						)
					)
				) 
			);
			$this->facebookmessenger->passThreadControl($sender, '263902037430900');
		}
		
		if ($payload == 'take_thread_control') {
			$this->facebookmessenger->takeThreadControl($sender);
			$this->facebookmessenger->sendMessage( $sender, $this->message->text('🤖🙂 Ey que bueno que estas de regreso') );
		}
		
    }

    public function booking_response($sender){
    	$user_profile = $this->facebookmessenger->getUserProfile($sender);
    	$this->facebookmessenger->sendMessage( $sender, $this->message->text('Muy bien! '.$user_profile['name'].', tu mesa esta reservada') );
    }
    public function booking_fail($sender){
    	$user_profile = $this->facebookmessenger->getUserProfile($sender);
    	$this->facebookmessenger->sendMessage( $sender, $this->message->text('Lo siento! '.$user_profile['name'].', tu peticion fallo') );
    }

    /*Blocks
    ==============================*/
    private function block_primary_menu($sender){
    	$this->facebookmessenger->sendMessage( 
			$sender, 
			$this->message->attachment( 
				'template', 
				$this->template->button(
					'¿Como podemos ayudarte? 👇', 
					array(
						$this->button->postback('Menu 👆', 'block_menus'), 
						$this->button->postback('Promos 👆', 'block_promos'),
						$this->button->url_webview( base_url().'booking/book_a_table/'.$sender, 'Reservar 👆', 'full' )
					)
				)
			) 
		);
    }
    private function block_menus($sender){
    	$menus = $this->menu_model->all();
    	$this->facebookmessenger->sendMessage( 
			$sender, 
			$this->message->attachment( 
				'template', 
				$this->template->generic(
					$this->menu_blocks($menus)
				)
			) 
		);
		$this->facebookmessenger->sendMessage( 
			$sender, 
			$this->message->quick_replies( 
				'Para más opciones, toque en la parte inferior a continuación', 
				array(
					$this->button->quick_reply('text', 'Regresar', 'primary_menu'), 
					$this->button->quick_reply('text', 'Promos', 'block_promos'),
					$this->button->quick_reply('text', 'Reservaciones', 'block_reservaciones')
				)
			) 
		);
    }

    private function block_items($sender, $items){
    	$this->facebookmessenger->sendMessage( 
			$sender, 
			$this->message->attachment( 
				'template', 
				$this->template->generic(
					$this->item_blocks($items)
				)
			) 
		);
		$this->facebookmessenger->sendMessage( 
			$sender, 
			$this->message->quick_replies( 
				'Para más opciones, toque en la parte inferior a continuación', 
				array(
					$this->button->quick_reply('text', 'Regresar', 'block_menus'), 
					$this->button->quick_reply('text', 'Comenzar de nuevo', 'welcome_message'), 
					$this->button->quick_reply('text', 'Promos', 'block_promos'),
					$this->button->quick_reply('text', 'Reservaciones', 'block_reservaciones')
				)
			) 
		);
    }

    private function block_promos($sender){
    	$promos = $this->promo_model->all();
    	$this->facebookmessenger->sendMessage( 
			$sender, 
			$this->message->attachment( 
				'template', 
				$this->template->generic(
					$this->promo_blocks($promos)
				)
			) 
		);
		$this->facebookmessenger->sendMessage( 
			$sender, 
			$this->message->quick_replies( 
				'Para más opciones, toque en la parte inferior a continuación', 
				array(
					$this->button->quick_reply('text', 'Comenzar de nuevo', 'welcome_message'), 
					$this->button->quick_reply('text', 'Nuestro Menu', 'block_menus'), 
					$this->button->quick_reply('text', 'Reservaciones', 'block_reservaciones')
				)
			) 
		);
    }



    /*Blocks Foreach
    ==============================*/
    private function menu_blocks($menus){
    	$menus_array = array();
		foreach($menus as $menu){

			$menus_array[] = $this->gallery->galeria(
				$menu->title, 
				'', 
				base_url().'assets/images/menu/'.$menu->image, 
				array( $this->button->postback('View More 👆', 'block_item_'.$menu->id) )
			);
		};
		return $menus_array;
    }

    private function item_blocks($items){
    	$items_array = array();
		foreach($items as $item){
			$items_array[] = $this->gallery->galeria(
				$item->title, 
				$item->subtitle, 
				base_url().'assets/images/items/'.$item->image, 
				array( $this->button->url_webview( base_url().'items/public_view/'.$item->id, 'View Details 👆', 'full' ) )
			);
		};
		return $items_array;
    }

    private function promo_blocks($promos){
    	$promos_array = array();
		foreach($promos as $promo){

			$promos_array[] = $this->gallery->galeria(
				$promo->title, 
				'', 
				base_url().'assets/images/promos/'.$promo->image, 
				array( $this->button->url_webview( base_url().'promos/public_view/'.$promo->id, 'View Details 👆', 'full' ) )
			);
		};
		return $promos_array;
    }

    /*Create Chatbot User
    =============================*/
    private function save_user_data($sender, $user_profile)
	{
		if ( !$this->chatbot_user_model->the_user_exists($sender) ) {
			$args = array(
				'sender_id' => $sender,
				'first_name' => $user_profile['first_name'],
				'last_name' => $user_profile['last_name'],
				'profile_pic' => $user_profile['profile_pic'],
				'created_date' => date("Y-m-d")
			);
			$this->chatbot_user_model->save($args);
		}
	}

	/*Track Reports
	==============================*/
	private function track_chat_user_report($sender){
		if ($sender != '683723788752824') {
			$this->load->model('chat_user_report_model');
			$args = array(
				'chatbot_user_id' => $sender,
				'created_date' => date("Y-m-d")
			);
			$this->chat_user_report_model->save($args);
		}		
	}

	private function track_menu_report($sender, $menu_id){
		$this->load->model('menu_report_model');
		$args = array(
			'chatbot_user_id' => $sender,
			'menu_id' => $menu_id,
			'created_date' => date("Y-m-d")
		);
		$this->menu_report_model->save($args);
	}

    /*Rest Set
    =============================*/
    public function set_welcome_message(){
    	$url = "https://graph.facebook.com/v3.0/me/thread_settings?access_token=$this->access_token"; 
    	$jsonData = '{
			"setting_type":"call_to_actions",
			"thread_state":"new_thread",
			"call_to_actions":[
				{
					"payload":"welcome_message"
				}
			]
		}';
		$this->set_post_curl($jsonData, $url);
    }

    public function set_persistent_menu(){
    	$url = "https://graph.facebook.com/v3.0/me/messenger_profile?access_token=$this->access_token"; 
    	$jsonData = '{
			"persistent_menu":[
			    {
			      "locale":"default",
			      "composer_input_disabled": false,
			      "call_to_actions":[
			        {
			          "title":"Reservaciones",
			          "type":"postback",
			          "payload":"block_reservaciones"
			        },
			        {
			          "title":"👤 Hablar con un asesor",
			          "type":"postback",
			          "payload":"pass_thread_control"
			        }
			      ]
			    }
			]
		}';
		$this->set_post_curl($jsonData, $url);
    }


    private function set_post_curl($jsonData, $url){
		$jsonDataEncoded = $jsonData;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$result = curl_exec($ch);
		echo $result;
    }

}