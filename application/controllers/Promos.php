<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Promos extends Base_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library( array('session', 'form_validation', 'email', 'upload', 'image_lib') );
		$this->load->helper(array('form', 'url', 'loadview'));
		$this->load->model('promo_model');
	}

	public function public_view($id_promo){
		$data['promo'] = $this->promo_model->find($id_promo);
		$this->load->view('promos/public', $data);
	}

	public function index()
	{		
		$this->check_session();
		$data['title'] ="Promociones";
		$data['app_scripts'] = "app-all-promos.js";
		$data['promos'] = $this->promo_model->all();
		view_loader('promos/index', $data);		
	}
	public function new_promo()
	{
		$this->check_session();
		$this->has_limit_promos();
		$data['title'] = "Crear Promo";
		$data['app_scripts'] = "app-promo.js";
		$data['action'] = base_url()."promos/create";
		view_loader('promos/new', $data);
	}
	public function edit($id)
	{
		$this->check_session();
		$data['title'] = "Editar Promo";
		$data['app_scripts'] = "app-promo-edit.js";
		$data['promo'] = $this->promo_model->find($id);
		$data['action'] = base_url()."promos/update";
		view_loader('promos/edit', $data);
	}
	public function create()
	{
		$this->check_session();
		$this->has_limit_promos();
		if ( $this->promos_params() ) {
			$args = array(
				'image' => $this->input->post('image_name', TRUE),
				'title' => $this->input->post('title', TRUE),
				'description' => $this->input->post('description', TRUE),
			);
			$this->promo_model->save($args);
			redirect(base_url().'promos');
		}
		else{
			$this->new_promo();
		}
	}
	public function update()
	{	
		$this->check_session();
		if ( $this->promos_params() ) {
			$id = $this->input->post('id', TRUE);
			$args = array(
				'image' => $this->input->post('image_name', TRUE),
				'title' => $this->input->post('title', TRUE),
				'description' => $this->input->post('description', TRUE),
			);
			$this->promo_model->update($id, $args);
			redirect(base_url().'promos');
		}
		else{
			$this->edit( $this->input->post('id', TRUE) );
		}
	}
	public function destroy($id)
	{
		$this->check_session();
		$old_image = $this->promo_model->find($id);
		unlink('./assets/images/promos/'.$old_image->image);
		$this->promo_model->delete($id);
		redirect(base_url().'promos');
	}
	private function check_session()
   	{
   		if( $this->session->userdata('is_logued_in') == FALSE ){
   			redirect(base_url().'login');
   		}
   	}
   	private function promos_params()
	{
		$this->form_validation->set_rules(
        	'title', 'Nombre de la Promoción', 
        	'required|trim|min_length[2]|max_length[80]|xss_clean',
        	array(
        			'required' => 'El titulo de la promoción es requerido',
        			'max_length' => 'El titulo de la promoción no debe exceder los 80 caracteres.'
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
   	public function has_the_limit_of_promos()
	{
		$this->check_session();
        echo json_encode( $this->promo_model->count_rows() );
	}
	private function has_limit_promos()
	{
		if ($this->promo_model->count_rows() >= 10) {
			redirect(base_url().'promos');
		}
	}

}