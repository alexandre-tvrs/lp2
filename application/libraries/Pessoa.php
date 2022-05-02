<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/dao/dao.php';


class Pessoa extends Dao { 

    function __construct() {
        parent::__construct('pessoa');
    }
}