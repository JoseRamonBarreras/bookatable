<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library( array('session', 'form_validation', 'email', 'upload', 'image_lib') );
		$this->load->helper(array('form', 'url', 'loadview'));
		$this->load->model('booking_model');
	}

	public function index()
	{		
		$this->check_session();
		$data['title'] ="Bookings";
		$data['app_scripts'] = "app-data-table.js";
		$data['bookings'] = $this->booking_model->all();
		view_loader('booking/index', $data);		
	}

	public function destroy($id)
	{
		$this->check_session();
		$this->booking_model->delete($id);
		redirect(base_url().'booking');
	}

	public function book_a_table($sender){
		$data['title'] ="Booking";
		$data['sender'] = $sender;
		$this->load->view('booking/public', $data);
	}

	public function create()
	{	
		if ( $this->booking_params() ) {
			$args = array(
				'chatbot_user_id' => $_POST['sender'],
				'persons' => $_POST['persons'],
				'date_book' => $_POST['date'],
				'time_book' => $_POST['time'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'created_date' => date("Y-m-d")
			);

			if ($this->is_booking($_POST['date'], $_POST['time'])) {
				echo json_encode("ocupado");
			}
			else{
				$this->booking_the_table($args);
				echo json_encode("agendado");
			}
	
		}
		else{
			echo json_encode("inputsrequired");
		}

	}

	private function is_booking($date, $time){
		if ($this->booking_model->booking_exist($date, $time)) {
			return true;
		}
		else{
			return false;
		}
	}

	private function booking_the_table($args){
		$this->booking_model->save($args);
	}

	private function booking_params()
	{
		$this->form_validation->set_rules(
        	'persons', 'Persons', 
        	'required|numeric|integer',
        	array(
        			'required' => 'persons fail',
        		)
        );
        $this->form_validation->set_rules(
        	'date', 'Date', 
        	'required',
        	array(
        			'required' => 'date fail',
        		)
        );
        $this->form_validation->set_rules(
        	'time', 'Time', 
        	'required',
        	array(
        			'required' => 'time fail',
        		)
        );
        $this->form_validation->set_rules(
        	'email', 'Email', 
        	'required|valid_email',
        	array(
        			'required' => 'email fail',
        		)
        );
        $this->form_validation->set_rules(
        	'phone', 'Phone', 
        	'required|numeric',
        	array(
        			'required' => 'phone fail',
        		)
        );

        return $this->form_validation->run();
	}

	private function check_session()
   	{
   		if( $this->session->userdata('is_logued_in') == FALSE ){
   			redirect(base_url().'login');
   		}
   	}
}