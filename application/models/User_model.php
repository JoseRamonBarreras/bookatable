<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends Base_Model {
	// belongs_to :group 
	private $table = 'users';
	private $view;
	public function __construct() {
		parent::__construct($this->table);
		$this->view = 'user_list';
	}
	//@override
	public function all()
	{
		$query = $this->db->get($this->view);
		return $query->result();
	}
	public function findUser( $email, $password )
	{
		$this->db->where( 'email', $email );
		$this->db->where( 'password', $password );
		$query = $this->db->get($this->table);
		if( $query->num_rows() == 1 )
		{
			return $query->row();
		}else{ 
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'login','refresh');
		}
	}
}