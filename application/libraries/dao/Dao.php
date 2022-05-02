<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';


class Dao extends CI_Object { 

    protected $table = '';

    function __construct($table) {
        $this->table = $table;
    }

    public function create($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
