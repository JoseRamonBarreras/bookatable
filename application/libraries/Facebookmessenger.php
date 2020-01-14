<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebookmessenger {
	private $access_token;
    private $verify_token;
    private $hubMode;
    private $hubChallenge;
    private $hubVerifyToken;
    private $api_url_messenger ="https://graph.facebook.com/v3.0/me/";
    private $request;
    private $type_response = 'RESPONSE';
    
    public function __construct($config, $request = null)
    {
        $this->access_token = $config['access_token'];
        $this->verify_token = $config['verify_token'];
        
        if (!$request) {
            $this->request = $_REQUEST;
        }else{
            $this->request = $request;
        }
    }

    public function getSender(){
        $sender = $this->listen();
        return $sender['entry'][0]['messaging'][0]['sender']['id'];
    }

    public function getMessage(){
        $message = $this->listen();
        return $message['entry'][0]['messaging'][0]['message']['text'];
    }
    
    public function getPayload(){
        $pay_load = $this->listen();
        if ($pay_load['entry'][0]['messaging'][0]['postback']['payload']) {
            return $pay_load['entry'][0]['messaging'][0]['postback']['payload'];
        }
        if ($pay_load['entry'][0]['messaging'][0]['message']['quick_reply']['payload']) {
            return $pay_load['entry'][0]['messaging'][0]['message']['quick_reply']['payload'];
        }
        return null;
    }

    public function listen()
    {
        if (isset($this->request['hub_mode']) && isset($this->request['hub_verify_token']) && isset($this->request['hub_challenge'])) {
            $this->hubMode = trim($this->request['hub_mode']);
            $this->hubVerifyToken = trim($this->request['hub_verify_token']);
            $this->hubChallenge = trim($this->request['hub_challenge']);
            echo $this->hubChallenge;
            exit();
        }
        if (file_get_contents('php://input')) {
            return json_decode(file_get_contents('php://input'), true);
        }
        return null;
    }

    

    public function sendMessage($recipientId, $message)
    {
         $dataToSend = [
            'recipient' => [
                'id' => $recipientId
            ],
            'message' => $message,
            'messaging_type' => $this->type_response
        ];
        return $this->curlRequest($dataToSend, $this->api_url_messenger."messages");
    }

    public function sendAction($recipientId, $action)
    {
         $dataToSend = [
            'recipient' => [
                'id' => $recipientId
            ],
            'sender_action' => $action,
            'messaging_type' => $this->type_response
        ];
        return $this->curlRequest($dataToSend, $this->api_url_messenger."messages");
    }

    public function passThreadControl($recipientId, $target_app_id)
    {
        $dataToSend = [
            'recipient' => [
                'id' => $recipientId
            ],
            'target_app_id' => $target_app_id
        ];
        return $this->curlRequest($dataToSend, $this->api_url_messenger."pass_thread_control");
    }

    public function takeThreadControl($recipientId)
    {
        $dataToSend = [
            'recipient' => [
                'id' => $recipientId
            ]
        ];
        return $this->curlRequest($dataToSend, $this->api_url_messenger."take_thread_control");
    }

    public function getUserProfile( $recipientId )
    {   
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://graph.facebook.com/v3.0/".$recipientId."?fields=name,first_name,last_name,profile_pic&access_token=".$this->access_token."",
        ));
        return json_decode( curl_exec( $curl ), true);
        curl_close( $curl );
    }

    private function curlRequest( $data, $api_url_messenger )
    {
        $data['access_token'] = $this->access_token;
        $ch = curl_init($api_url_messenger);
        $headers = [
            'Content-Type: application/json'
        ];
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        return curl_exec($ch);
    }

}