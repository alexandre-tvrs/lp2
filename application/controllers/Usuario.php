<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Usuario extends MY_Controller{

  function __construct() {
    parent::__construct();
    $this->load->model('UsuarioModel', 'user');
  }

  public function index() {
    $v['table'] = $this->user->listUser();

    $html = $this->load->view('user/list_user', $v, true);
    $this->show($html);
  }

  public function cadastro(){
    $this->user->create();

    $html = $this->load->view('user/form_user', null, true);
    $this->show($html);
    }

  public function editar($id) {
    $this->user->update($id);
    $this->user->loadUser($id);
    $html = $this->load->view('user/form_user', null, true);
    $this->show($html);
  }

  public function apagar($id){
    $this->user->remove($id);
    $this->user->loadUser($id);
    $html = $this->load->view('user/form_remove_user', null, true);
    $this->show($html);
  }

  function poli() {
    $this->load->model('PooModel');
    $this->PooModel->polimorfismo();
  }

}
