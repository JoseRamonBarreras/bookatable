<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Groups extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->helper(array('url', 'loadview'));
		$this->load->model('group_model');
	}
	public function index()
	{		
		$this->check_session();
		$this->isAdmin();
		$data['title'] ="Grupos";
		$data['app_scripts'] = "app-data-table.js";
		$data['groups'] = $this->group_model->all();
		view_loader('groups/index', $data);	
	}
	public function newGroup()
	{
		$this->check_session();
		$this->isAdmin();
		$data['title'] = "Crear Nuevo Grupo";
		$data['app_scripts'] = "app-group.js";
		$data['action'] = base_url()."groups/create";
		view_loader('groups/new', $data);
	}
	public function edit($id)
	{
		$this->check_session();
		$this->isAdmin();
		$data['title'] = "Editar Grupo";
		$data['group'] = $this->group_model->find($id);
		$data['action'] = base_url()."groups/update";
		view_loader('groups/edit', $data);
	}
	public function show($id)
	{
		$this->check_session();
		$this->isAdmin();
		$data['group'] = $this->group_model->find($id);
		$data['title'] = $data['group']->name;
		$data['action'] = base_url()."groups/update";
		view_loader('groups/show', $data);
	}
	public function create()
	{
		$this->check_session();
		$this->isAdmin();
		if ( $this->groups_params() ) {
			$args = array(
				'name' => $this->input->post('name', TRUE),
				'description' => $this->input->post('description', TRUE),
			);
			$this->group_model->save($args);
			redirect(base_url().'groups');
		}
		else{
			$this->newGroup();
		}
	}
	public function update()
	{
		$this->check_session();
		$this->isAdmin();
		if ( $this->groups_params() ) {
			$id = $this->input->post('id', TRUE);
			$args = array(
				'name' => $this->input->post('name', TRUE),
				'description' => $this->input->post('description', TRUE),
			);
			$this->group_model->update($id, $args);
			redirect(base_url().'groups');
		}
		else{
			$this->edit( $this->input->post('id', TRUE) );
		}
	}
	public function destroy($id)
	{
		$this->check_session();
		$this->isAdmin();
		$this->group_model->delete($id);
		redirect(base_url().'groups');
	}
	private function groups_params()
	{
		$this->form_validation->set_rules(
        	'name', 'Nombre Del Grupo', 
        	'required|trim|min_length[2]|max_length[150]|xss_clean',
        	array(
        			'required' => 'El nombre del grupo es requerido',
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
   	private function isAdmin()
   	{
   		if ( $this->session->userdata('user_id_group') != 1 ) {
   			redirect(base_url().'login');
   		}
   	}
}
