<?php

class UsuarioModel extends CI_Model {
    public function create() {
        if (sizeof($_POST) == 0 ) return;

        $this->form_validation->set_rules('nome', 'Nome da pessoa', 'required | min_lenght[2] | max_lenght[19]');
        $this->form_validation->set_rules('snome', 'Sobrenome da pessoa', 'required | min_lenght[2] | max_lenght[256]');
        $this->form_validation->set_rules('email', 'Endereço eletrônico', 'required | valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required | min_lenght[8] | max_lenght[32] | ');

        if ($this->form_validation->run()) {

        } else {

        }

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
    }
}
