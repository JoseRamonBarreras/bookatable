<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chatbot_users extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library( array('session', 'form_validation', 'email', 'upload', 'image_lib') );
		$this->load->helper(array('form', 'url', 'loadview'));
		$this->load->model('chatbot_user_model');
	}
}