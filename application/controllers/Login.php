<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller

{
    public function __construct()
    {
        parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form', 'loadview'));
		$this->load->model('user_model');
    }

	public function index()

	{	
		if($this->session->userdata('is_logued_in'))
		{
			redirect(base_url().'users');
		}
		elseif (!$this->session->userdata('is_logued_in')) {
			$data['token'] = $this->token();
			$data['title'] = 'Acceso a Sistema';
			$data['app_scripts'] = "app-login.js";
			$data['action'] = base_url()."login/start";
			$this->load->view('login/index', $data);
		}
		else{
			$data['action'] = base_url()."login/start";
			$data['titulo'] = 'Acceso a Sistema';
			$this->load->view('login/index', $data);
		}
	}

	public function start()
	{
		$this->validateToken();
		if ( $this->login_params() ) {
			$check_user = $this->user_model->findUser( 
					$this->input->post('email'), 
					sha1($this->input->post('password')) 
				);

			if($check_user == TRUE)
			{
				$data = array(
                'is_logued_in' => TRUE,
                'user_id' 		=> $check_user->id,
                'user_email'		=> $check_user->email,
                'user_name'	=> $check_user->full_name,
                'user_id_group' => $check_user->group_id
        		);	

				$this->session->set_userdata($data);
				$this->index();
			}
		}

		else
		{
			$this->index();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

	private function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	private function login_params()
	{
        $this->form_validation->set_rules(
        	'email', 'Email', 
        	'required|valid_email|trim|min_length[2]|max_length[150]|xss_clean',
        	array(
        			'required' => 'El email es requerido',
        			'valid_email' => 'Ingrese una cuenta de correo valida'
        		)
        );
        $this->form_validation->set_rules(
        	'password', 'Password', 
        	'required|trim|min_length[3]|max_length[150]|xss_clean',
        	array(
        			'required' => 'El %s es requerido',
            		'min_length' => 'El %s debe tener al menos 3 caracteres de longitud.',
            		'max_length' => 'El %s no puede exceder los 150 caracteres de longitud.',
        		)
        );
        return $this->form_validation->run();
	}

	private function validateToken()
   	{
   		if( $this->input->post('token') && $this->input->post('token') == $this->session->userdata('token') ){
   		}
   		else{
   			redirect(base_url().'login');
   		}
   	}

}