<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/dao/dao.php';


class Mail extends Dao { 

    function __construct() {
        parent::__construct('email');
    }

    // public function create($data) {
    //     $this->db->insert('email', $data);
    //     return $this->db->insert_id();
    // }
}