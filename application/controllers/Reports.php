<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->helper(array('url', 'loadview'));
		$this->load->model('chatbot_user_model');
		$this->load->model('menu_report_model');
      	$this->load->model('promo_report_model');
      	$this->load->model('chat_user_report_model');
	}
	public function index()
	{		
		$this->check_session();
		$data['title'] ="Reportes";
		$data['app_scripts'] = "app-reports.js";
		view_loader('reports/index', $data);	
	}

	

	private function check_session()
	{
		if( $this->session->userdata('is_logued_in') == FALSE ){
			redirect(base_url().'login');
		}
	}

	public function general_report($date, $range_date = null)
	{
		if($range_date){
			$report = array(
				'users' =>  $this->chatbot_user_model->count_with_range( $date, $range_date ), 
				'menus' =>  $this->menu_report_model->count_with_range( $date, $range_date ),
            	'promos' =>  $this->promo_report_model->count_with_range( $date, $range_date )
			);
			echo json_encode( $report );
		}
		else{
			$report = array(
				'users' =>  $this->chatbot_user_model->count( $date ), 
				'menus' =>  $this->menu_report_model->count( $date ),
            	'promos' =>  $this->promo_report_model->count( $date )
			);
			echo json_encode( $report );
		}
		
	}

	public function promo_report($date, $range_date = null)
	{
		if($range_date){
			$report = $this->promo_report_model->get_with_range($date, $range_date);
			echo json_encode( $report );
		}
		else{
			$report = $this->promo_report_model->get_with_date( $date );
			echo json_encode( $report );
		}
		
	}

	public function menu_report($date, $range_date = null)
	{
		if($range_date){
			$report = $this->menu_report_model->get_with_range($date, $range_date);
			echo json_encode( $report );
		}
		else{
			$report = $this->menu_report_model->get_with_date( $date );
			echo json_encode( $report );
		}
		
	}
	public function user_report($date, $range_date = null)
	{
		if($range_date){
			$report = $this->chat_user_report_model->get_with_range($date, $range_date);
			echo json_encode( $report );
		}
		else{
			$report = $this->chat_user_report_model->get_with_date( $date );
			echo json_encode( $report );
		}
		
	}
}