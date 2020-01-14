<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chat_user_report_model extends Base_Model {
	private $table = 'chat_user_reports';
	public function __construct() {
		parent::__construct($this->table);
	}

	public function get_with_date($date)
	{	
		
		$query = $this->db->query("
			SELECT chatbot_users.sender_id, chatbot_users.first_name, COUNT(chat_user_reports.id) AS Total 
			FROM chatbot_users LEFT JOIN chat_user_reports ON chatbot_users.sender_id = chat_user_reports.chatbot_user_id 
			WHERE chat_user_reports.created_date = '".$date."'
			GROUP BY chatbot_users.sender_id, chatbot_users.first_name 
		");
		return $query->result();
	}
	public function get_with_range($today_date, $range_date)
	{	
		
		$query = $this->db->query("
			SELECT chatbot_users.sender_id, chatbot_users.first_name, COUNT(chat_user_reports.id) AS Total 
			FROM chatbot_users LEFT JOIN chat_user_reports ON chatbot_users.sender_id = chat_user_reports.chatbot_user_id 
			WHERE chat_user_reports.created_date between '".$range_date."' and '".$today_date."'
			GROUP BY chatbot_users.sender_id, chatbot_users.first_name 

		");
		return $query->result();
	}
}