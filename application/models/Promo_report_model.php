<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Promo_report_model extends Base_Model {
	private $table = 'promo_reports';
	private $promo;
	public function __construct() {
		parent::__construct($this->table);
		$this->promo = 'promos';
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
			SELECT promos.id, promos.title, COUNT(promo_reports.id) AS Total 
			FROM promos LEFT JOIN promo_reports ON promos.id = promo_reports.promo_id 
			WHERE promo_reports.created_date = '".$date."'
			GROUP BY promos.id, promos.title 
		");
		return $query->result();
	}
	public function get_with_range($today_date, $range_date)
	{	
		
		$query = $this->db->query("
			SELECT promos.id, promos.title, COUNT(promo_reports.id) AS Total 
			FROM promos LEFT JOIN promo_reports ON promos.id = promo_reports.promo_id 
			WHERE promo_reports.created_date between '".$range_date."' and '".$today_date."'
			GROUP BY promos.id, promos.title 

		");

		return $query->result();
		
	}
}