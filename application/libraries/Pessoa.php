<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/dao/dao.php';


class Pessoa extends Dao {

    function __construct() {
      parent::__construct('pessoa');
    }

    public function listaPessoa() {
      $sql = "SELECT pessoa.id, nome, snome, endereco as email, numero as telefone FROM pessoa, ";
      $sql .= "email, telefone WHERE pessoa.id = telefone.id_pessoa AND ";
      $sql .= "pessoa.id = email.id_pessoa";
      $res = $this->db->query($sql);
      return $res->result_array();
    }


}
