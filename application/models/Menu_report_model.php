<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_report_model extends Base_Model {
	private $table = 'menu_reports';
	public function __construct() {
		parent::__construct($this->table);
	}
	
	public function count($date)
	{
		$query = $this->db->get_where($this->table, array('created_date' => $date));
		return $query->num_rows();
	}

	public function count_with_range($today_date, $range_date)
	{
		$this->db->where('created_date >=', $range_date);
		$this->db->where('created_date <=', $today_date);
		$query = $this->db->get( $this->table );
		return $query->num_rows();
	}

	public function get_with_date($date)
	{	
		
		$query = $this->db->query("
			SELECT menus.id, menus.title, COUNT(menu_reports.id) AS Total 
			FROM menus LEFT JOIN menu_reports ON menus.id = menu_reports.menu_id 
			WHERE menu_reports.created_date = '".$date."'
			GROUP BY menus.id, menus.title 
		");
		return $query->result();
	}
	public function get_with_range($today_date, $range_date)
	{	
		
		$query = $this->db->query("
			SELECT menus.id, menus.title, COUNT(menu_reports.id) AS Total 
			FROM menus LEFT JOIN menu_reports ON menus.id = menu_reports.menu_id 
			WHERE menu_reports.created_date between '".$range_date."' and '".$today_date."'
			GROUP BY menus.id, menus.title 

		");
		return $query->result();
	}
}