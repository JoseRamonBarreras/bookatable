<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Model extends CI_Model {
	private $table;
    public function __construct($table) {
        parent::__construct();
        $this->table = $table;
    }

    public function all()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function find($id)
	{
		$query = $this->db->get_where( $this->table, array('id' => $id) );
		return $query->row();
	}

	public function save($args)
	{
		$this->db->insert($this->table, $args); 
	}

	public function update($id, $args)
	{
		$this->db->where('id', $id);
    	$this->db->update($this->table, $args);
	}

	public function count_rows()
	{
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

    public function delete($id)
	{
		$this->db->delete($this->table, array('id' => $id)); 
	}

}