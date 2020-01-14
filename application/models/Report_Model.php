<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Model extends Base_Model {
	private $table;
    public function __construct($table) {
        parent::__construct($table);
        $this->table = $table;
    }

}