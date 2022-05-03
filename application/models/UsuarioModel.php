<?php

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


}
