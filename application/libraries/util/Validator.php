<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Validator extends CI_Object {

  public function validateUser() {
    $this->form_validation->set_rules('nome', 'Nome da pessoa', 'required|min_lenght[2]|max_lenght[19]');
    $this->form_validation->set_rules('snome', 'Sobrenome da pessoa', 'required|min_lenght[2]|max_lenght[256]');
    $this->form_validation->set_rules('email', 'Endereço eletrônico', 'required|valid_email');
    $this->form_validation->set_rules('senha', 'Senha', 'required|min_lenght[8]|max_lenght[32]');
    $this->form_validation->set_rules('conf_senha', 'Confirmação da Senha', 'required|match[senha]');
    $this->form_validation->set_rules('telefone', 'Telefone', 'min_lenght[10]|max_lenght[14]');

    return $this->form_validation->run();

  }

}
?>
