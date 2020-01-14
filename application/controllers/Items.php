<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Items extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library( array('session', 'form_validation', 'email', 'upload', 'image_lib') );
		$this->load->helper(array('form', 'url', 'loadview'));
		$this->load->model('item_model');
		$this->load->model('menu_model');
	}

	public function public_view($id_item){
		$data['item'] = $this->item_model->find($id_item);
		$this->load->view('items/public', $data);
	}

	public function new_item($id_menu)
	{
		if ($id_menu) {
			$this->check_session();
			$this->has_limit_items($id_menu);
			$data['title'] = "Crear Item";
			$data['app_scripts'] = "app-item.js";
			$data['action'] = base_url()."items/create";
			$data['menu'] = $this->menu_model->find($id_menu);
			view_loader('items/new', $data);
		}
		else{
			redirect(base_url().'menus');
		}
	}
	public function edit($id_menu, $id_item)
	{
		if ($id_menu && $id_item) {
			$this->check_session();
			$data['title'] = "Editar Item";
			$data['app_scripts'] = "app-item-edit.js";
			$data['action'] = base_url()."items/update";
			$data['menu'] = $this->menu_model->find($id_menu);
			$data['item'] = $this->item_model->find_item($id_menu, $id_item);
			view_loader('items/edit', $data);
		}
		else{
			redirect(base_url().'menus');
		}
	}
	public function create()
	{
		$this->check_session();
		$id_menu = $this->input->post('id_menu', TRUE);
		$this->has_limit_items($id_menu);
		if ( $this->items_params() ) {
			$args = array(
				'image' => $this->input->post('image_name', TRUE),
				'title' => $this->input->post('title', TRUE),
				'subtitle' => $this->input->post('subtitle', TRUE),
				'description' => $this->input->post('description', TRUE),
				'menu_id' => $id_menu
			);
			$this->item_model->save($args);
			redirect(base_url().'menus/show/'.$id_menu);
		}
		else{
			$this->new_item($id_menu);
		}
	}
	public function update()
	{	
		$this->check_session();
		$id_menu = $this->input->post('id_menu', TRUE);
		if ( $this->items_params() ) {
			$id = $this->input->post('id', TRUE);
			$args = array(
				'image' => $this->input->post('image_name', TRUE),
				'title' => $this->input->post('title', TRUE),
				'subtitle' => $this->input->post('subtitle', TRUE),
				'description' => $this->input->post('description', TRUE),
			);
			$this->item_model->update($id, $args);
			redirect(base_url().'menus/show/'.$id_menu);
		}
		else{
			$this->edit( $id_menu, $this->input->post('id', TRUE) );
		}
	}
	public function destroy($id_menu, $id_item)
	{
		$this->check_session();
		$old_image = $this->item_model->find($id_item);
		unlink('./assets/images/items/'.$old_image->image);
		$this->item_model->delete($id_item);
		redirect(base_url().'menus/show/'.$id_menu);
	}
	private function check_session()
   	{
   		if( $this->session->userdata('is_logued_in') == FALSE ){
   			redirect(base_url().'login');
   		}
   	}
   	private function items_params()
	{
		$this->form_validation->set_rules(
        	'title', 'Titulo', 
        	'required|trim|min_length[2]|max_length[80]|xss_clean',
        	array(
        			'required' => 'El titulo del item es requerido',
        			'max_length' => 'El titulo del item no debe exceder los 80 caracteres.'
        		)
        );
        $this->form_validation->set_rules(
        	'subtitle', 'Subtitulo', 
        	'required|trim|min_length[2]|max_length[80]|xss_clean',
        	array(
        			'required' => 'El subtitulo del item es requerido',
        			'max_length' => 'El subtitulo del item no debe exceder los 80 caracteres.'
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
	public function has_the_limit_of_items($id_menu)
	{
		$this->check_session();
        echo json_encode( $this->item_model->number_of_items_from_menu($id_menu) );
	}
	private function has_limit_items($id_menu)
	{
		if ($this->item_model->number_of_items_from_menu($id_menu) >= 10) {
			redirect(base_url().'menus/show/'.$id_menu);
		}
	}
}