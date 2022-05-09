<?php
include_once APPPATH.'libraries/component/Table.php';
include_once APPPATH.'libraries/util/ButtonGenerator.php';

class UsuarioModel extends CI_Model {

    public function create() {
        if (sizeof($_POST) == 0 ) return;

        if ($this->validator->validateUser()) {

          $data['nome'] = $this->input->post('nome');
          $data['snome'] = $this->input->post('snome');
          $data['senha'] = $this->input->post('senha');

          $this->load->library('pessoa');
          $id = $this->pessoa->create($data);

          $fone['numero'] = $this->input->post('telefone');
          $fone['id_pessoa'] = $id;
          $this->load->library('telefone');
          $this->telefone->create($fone);

          $mail['endereco'] = $this->input->post('email');
          $mail['id_pessoa'] = $id;
          $this->load->library('mail');
          $this->mail->create($mail);

        } else {
          return validation_errors();
        }

    }

    public function listUser() {
      $this->load->library('pessoa');
      $data = $this->pessoa->listaPessoa();

      foreach ($data as $key => $row) {
        $data[$key]['btn'] = ButtonGenerator::editHandler($row);
      }

      $label = ['', 'Nome', 'Sobrenome', 'Email', 'Telefone' ,''];
      $table = new Table($data, $label);
      return $table->getHTML();
    }



}
