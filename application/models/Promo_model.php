<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Promo_model extends Base_Model {
	private $table = 'promos';
	public function __construct() {
		parent::__construct($this->table);
	}
}