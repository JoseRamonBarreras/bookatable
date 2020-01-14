<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends Base_Model {
	// has_many :items
	private $table = 'menus';
	public function __construct() {
		parent::__construct($this->table);
	}
}