<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->helper(array('url', 'loadview'));
		$this->load->model('user_model');
		$this->load->model('group_model');
	}
	public function index()
	{		
		$this->check_session();
		$data['title'] ="Users";
		$data['app_scripts'] = "app-data-table.js";
		$data['users'] = $this->user_model->all();
		view_loader('users/index', $data);	
	}
	public function newUser()
	{
		$this->check_session();
		$data['title'] = "Crear Usuario";
		$data['app_scripts'] = "app-user.js";
		$data['action'] = base_url()."users/create";
		$data['groups'] = $this->group_model->all();
		view_loader('users/new', $data);
	}
	public function edit($id)
	{
		$this->check_session();
		$data['title'] = "Editar Usuario";
		$data['app_scripts'] = "app-user.js";
		$data['user'] = $this->user_model->find($id);
		$data['groups'] = $this->group_model->all();
		$data['action'] = base_url()."users/update";
		view_loader('users/edit', $data);
	}
	public function show($id)
	{
		$this->check_session();
		$data['user'] = $this->user_model->find($id);
		$data['title'] = $data['user']->full_name;
		view_loader('users/show', $data);
	}
	public function create()
	{
		$this->check_session();
		if ( $this->users_params() ) {
			$args = array(
				'ip_address' => $this->input->ip_address(),
				'full_name' => $this->input->post( 'full_name', TRUE ),
				'email' => $this->input->post( 'email', TRUE ),
				'password' => sha1( $this->input->post( 'password', TRUE ) ),
				'created_date' => date("Y-m-d"),
				'group_id' => $this->input->post( 'group_id', TRUE )
			);
			$this->user_model->save($args);
			redirect(base_url().'users');
		}
		else{
			$this->newUser();
		}
	}
	public function update()
	{	
		$this->check_session();
		if ( $this->users_edit_params() ) {
			$id = $this->input->post('id', TRUE);
			if ( $this->input->post('password', TRUE) == '' ) {
				$args = array(
					'full_name' => $this->input->post( 'full_name', TRUE ),
					'group_id' => $this->input->post( 'group_id', TRUE )
				);
			}
			else{
				$args = array(
					'full_name' => $this->input->post( 'full_name', TRUE ),
					'password' => sha1( $this->input->post( 'password', TRUE ) ),
					'group_id' => $this->input->post( 'group_id', TRUE )
				);
			}
			$this->user_model->update($id, $args);
			redirect(base_url().'users');
		}
		else{
			$this->edit( $this->input->post('id', TRUE) );
		}
	}
	public function destroy($id)
	{
		$this->check_session();
		$this->user_model->delete($id);
		redirect(base_url().'users');
	}
	private function users_params()
	{
		$this->form_validation->set_rules(
        	'full_name', 'Nombre Del Usuario', 
        	'required|trim|min_length[4]|max_length[150]|xss_clean',
        	array(
        			'required' => 'El nombre de usuario es requerido',
        		)
        );
        $this->form_validation->set_rules(
        	'email', 'Email', 
        	'required|valid_email|is_unique[users.email]',
        	array(
        			'required' => 'El email es requerido',
        		)
        );
        $this->form_validation->set_rules(
        	'password', 'Password', 
        	'required|min_length[8]|max_length[200]',
        	array(
        			'required' => 'El password es requerido',
        		)
        );
        return $this->form_validation->run();
	}
	private function users_edit_params()
	{
		$this->form_validation->set_rules(
        	'full_name', 'Nombre Del Usuario', 
        	'required|trim|min_length[4]|max_length[150]|xss_clean',
        	array(
        			'required' => 'El nombre de usuario es requerido',
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