<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Usuario extends MY_Controller{

    public function cadastro(){
        $this->load->model('UsuarioModel', 'user');
        $this->user->create();
        $html = $this->load->view('user/form_user', null, true);
        $this->show($html);
    }
}