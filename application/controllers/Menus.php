<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menus extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library( array('session', 'form_validation', 'email', 'upload', 'image_lib') );
		$this->load->helper(array('form', 'url', 'loadview'));
		$this->load->model('menu_model');
		$this->load->model('item_model');
	}
	public function index()
	{		
		$this->check_session();
		$data['title'] ="Menus";
		$data['app_scripts'] = "app-all-menus.js";
		$data['menus'] = $this->menu_model->all();
		view_loader('menus/index', $data);		
	}
	public function newMenu()
	{
		$this->check_session();
		$this->has_limit_menus();
		$data['title'] = "Crear Menu";
		$data['app_scripts'] = "app-menu.js";
		$data['action'] = base_url()."menus/create";
		view_loader('menus/new', $data);
	}
	public function edit($id)
	{
		$this->check_session();
		$data['title'] = "Editar Menu";
		$data['app_scripts'] = "app-menu-edit.js";
		$data['menu'] = $this->menu_model->find($id);
		$data['action'] = base_url()."menus/update";
		view_loader('menus/edit', $data);
	}
	public function show($id)
	{
		$this->check_session();
		$data['menu'] = $this->menu_model->find($id);
		$data['items'] = $this->item_model->all_items($id);
		$data['title'] = $data['menu']->title;
		$data['app_scripts'] = "app-menu-show.js";
		view_loader('menus/show', $data);
	}
	public function create()
	{
		$this->check_session();
		$this->has_limit_menus();
		if ( $this->menus_params() ) {
			$args = array(
				'image' => $this->input->post('image_name', TRUE),
				'title' => $this->input->post('title', TRUE),
			);
			$this->menu_model->save($args);
			redirect(base_url().'menus');
		}
		else{
			$this->newMenu();
		}
	}
	public function update()
	{	
		$this->check_session();
		if ( $this->menus_params() ) {
			$id = $this->input->post('id', TRUE);
			$args = array(
				'image' => $this->input->post('image_name', TRUE),
				'title' => $this->input->post('title', TRUE)
			);
			$this->menu_model->update($id, $args);
			redirect(base_url().'menus');
		}
		else{
			$this->edit( $this->input->post('id', TRUE) );
		}
	}
	public function delete_menu($id)
	{
		$this->check_session();
		$this->have_items_ajax($id);
	}
	public function destroy($id)
	{
		$this->check_session();
		$this->have_items($id);
		$old_image = $this->menu_model->find($id);
		unlink('./assets/images/menu/'.$old_image->image);
		$this->menu_model->delete($id);
		redirect(base_url().'menus');
	}
	private function have_items($id)
	{
		if ($this->item_model->number_of_items_from_menu($id)) {
			redirect(base_url().'menus');
		}
	}
	private function have_items_ajax($id)
	{
		if ($this->item_model->number_of_items_from_menu($id)) {
			echo json_encode($this->item_model->number_of_items_from_menu($id));
		}
	}
	private function check_session()
   	{
   		if( $this->session->userdata('is_logued_in') == FALSE ){
   			redirect(base_url().'login');
   		}
   	}
   	private function menus_params()
	{
		$this->form_validation->set_rules(
        	'title', 'Nombre del Menu', 
        	'required|trim|min_length[2]|max_length[80]|xss_clean',
        	array(
        			'required' => 'El titulo del menú es requerido',
        			'max_length' => 'El titulo del menú no debe exceder los 80 caracteres.'
        		)
        );
        $this->form_validation->set_rules(
        	'image_name', 'Imagen', 
        	'required|trim|min_length[2]|max_length[80]|xss_clean',
        	array(
        			'required' => 'La imagen es requerida'
        		)
        );
        return $this->form_validation->run();
	}
	public function has_the_limit_of_menus()
	{
		$this->check_session();
        echo json_encode( $this->menu_model->count_rows() );
	}
	private function has_limit_menus()
	{
		if ($this->menu_model->count_rows() >= 10) {
			redirect(base_url().'menus');
		}
	}	
}