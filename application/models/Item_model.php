<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Item_model extends Base_Model {
	// belongs_to :menu 
	private $table = 'menu_items';
	public function __construct() {
		parent::__construct($this->table);
	}
	public function all_items($menu_id)
	{
		$query = $this->db->get_where( $this->table, array('menu_id' => $menu_id) );
		return $query->result();
	}
	public function find_item($id_menu, $id_item)
	{
		$query = $this->db->get_where( $this->table, array('menu_id' => $id_menu, 'id' => $id_item) );
		return $query->row();
	}
	public function number_of_items_from_menu($menu_id)
	{
		$query = $this->db->get_where( $this->table, array('menu_id' => $menu_id) );
		return $query->num_rows();
	}
}