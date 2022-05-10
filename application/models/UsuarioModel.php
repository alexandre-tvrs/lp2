<?php
include_once APPPATH.'libraries/component/Table.php';
include_once APPPATH.'libraries/util/ButtonGenerator.php';

class UsuarioModel extends CI_Model {

  function __construct() {
    $this->load->library('pessoa');
    $this->load->library('mail');
    $this->load->library('telefone');
  }

    public function create() {
        if (sizeof($_POST) == 0 ) return;

        if ($this->validator->validateUser(true)) {

          $data = $this->readPostData();

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

    public function update(){
      if(sizeof($_POST) == 0) return;

      if($this->validator->validateUser(true)) {

      } else {
        return validation_errors();
      }
    }

    public function listUser() {
      $data = $this->pessoa->listaPessoa();

      $url = base_url('usuario/editar');

      foreach ($data as $key => $row) {
        $data[$key]['btn'] = ButtonGenerator::editHandler($row, $url);
      }

      $label = ['', 'Nome', 'Sobrenome', 'Email', 'Telefone' ,''];
      $table = new Table($data, $label);
      return $table->getHTML();
    }

    public function loadUser($id){
      $pessoa = $this->pessoa->getById($id);
      unset($pessoa['senha']);

      $email = $this->mail->getByUserId($id);
      $v['email'] = $email['endereco'];

      $telefone = $this->telefone->getByUserId($id);
      $v['telefone'] = $telefone['numero'];

      $_POST = array_merge($pessoa, $v);

    }

    private function readPostData(){
      $data['nome'] = $this->input->post('nome');
      $data['snome'] = $this->input->post('snome');

      $pass = $this->input->post('senha');
      $data['senha'] = md5($pass);
    }

}
