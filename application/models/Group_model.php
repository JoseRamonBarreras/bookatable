<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends Base_Model {
	// has_many :users
	private $table = 'groups';

	public function __construct() {
		parent::__construct($this->table);
	}
}