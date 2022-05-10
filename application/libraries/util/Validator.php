<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Validator extends CI_Object {

  public function validateUser($update = false) {
    $this->form_validation->set_rules('nome', 'Nome da pessoa', 'required|min_length[2]|max_length[19]');
    $this->form_validation->set_rules('snome', 'Sobrenome da pessoa', 'required|min_length[2]|max_length[256]');
    $this->form_validation->set_rules('email', 'Endereço eletrônico', 'required|valid_email');
    $this->form_validation->set_rules('telefone', 'Telefone', 'min_length[10]|max_length[14]');

    $cpl = $update ? '' : 'required|';
    $this->form_validation->set_rules('senha', 'Senha', $cpl. 'min_length[8]|max_length[32]');
    $this->form_validation->set_rules('conf_senha', 'Confirmação da Senha', $cpl. 'matches[senha]');


    return $this->form_validation->run();

  }

}
?>
