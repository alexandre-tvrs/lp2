<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';


class ContaDataBuilder extends CI_Object {

    private $contas = [
        [
            'parceiro' => 'Magalu', 
            'descricao' => 'Notebook', 
            'valor' => '2000', 
            'mes' => 1, 
            'ano' => 2021, 
            'tipo' => 'pagar'
        ],
        [
            'parceiro' => 'Casas Bahia', 
            'descricao' => 'Notebook', 
            'valor' => '3000', 
            'mes' => 1, 
            'ano' => 2021, 
            'tipo' => 'pagar'
        ],
        [
            'parceiro' => 'Prefeitura de Sucupira', 
            'descricao' => 'Salário', 
            'valor' => '3542.18', 
            'mes' => 1, 
            'ano' => 2021, 
            'tipo' => 'receber'
        ],
        [
            'parceiro' => 'Aluguel', 
            'descricao' => 'Casa alugada', 
            'valor' => '680', 
            'mes' => 1, 
            'ano' => 2021, 
            'tipo' => 'receber'
        ],
        [
            'parceiro' => 'Bandeirante', 
            'descricao' => 'Energia Elétrica', 
            'valor' => '97.25', 
            'mes' => 1, 
            'ano' => 2021, 
            'tipo' => 'pagar'
        ],
        [
            'parceiro' => 'Bandeirante', 
            'descricao' => 'Energia Elétrica', 
            'valor' => '81.25', 
            'mes' => 2, 
            'ano' => 2021, 
            'tipo' => 'pagar'
        ],
    ];
    
    public function start() {
        $this->load->library('conta');

        foreach ($this->contas as $conta) {
            $this->conta->cria($conta);
        }
    }

    public function clear() {
        $this->db->truncate('conta');
    }

}
