<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking_model extends Base_Model {
	private $table = 'bookings';
	private $view;
	public function __construct() {
		parent::__construct($this->table);
		$this->view = 'booking_list';
	}

	//@override
	public function all()
	{
		$query = $this->db->get($this->view);
		return $query->result();
	}

	public function booking_exist($date, $time)
	{		
		$query = $this->db->get_where( $this->table, array('date_book' => $date, 'time_book' => $time) );
		return $query->num_rows();;
	}
}