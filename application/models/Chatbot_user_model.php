<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chatbot_user_model extends Base_Model {
	private $table = 'chatbot_users';
	public function __construct() {
		parent::__construct($this->table);
	}

	public function the_user_exists($sender_id){
		$query = $this->db->get_where( $this->table, array('sender_id' => $sender_id) );
		return $query->num_rows();
	}

	public function count($date)
	{
		$query = $this->db->get_where($this->table, array('created_date' => $date));
		return $query->num_rows();
	}

	public function count_with_range($today_date, $range_date)
	{
		//$query = $this->db->query("SELECT * FROM $this->table WHERE created_date BETWEEN '$range_date' AND '$today_date'");
		$this->db->where('created_date >=', $range_date);
		$this->db->where('created_date <=', $today_date);
		$query = $this->db->get( $this->table );
		return $query->num_rows();
	}
}