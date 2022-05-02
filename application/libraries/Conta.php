<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';


class Conta extends CI_Object {

    /**
     * Cria uma conta do sistema. 
     * Contas podem ser dos tipo: a pagar ou a receber.
     * 
     * @param array: data - os dados da conta
     */
    function cria($data){
        unset($data['month']);
        $this->db->insert('conta', $data);
        return $this->db->insert_id();
    }


    public function listaCompleta($mes, $ano) {
        $data = ['mes' => $mes, 'ano' => $ano];
        $res = $this->db->get_where('conta', $data);
        return $res->result_array();
    }



    /**
     * Gera uma lista de contas.
     * 
     * @param string tipo: o tipo da conta
     * @param int mes: mes de acerto da conta
     * @param int ano: ano de acerto da conta
     */
    public function lista($tipo, $mes = 0, $ano = 0) {
        $data = ['mes' => $mes, 'ano' => $ano];
        if(strcmp($tipo, 'mista') != 0) {
            $data['tipo'] = $tipo;
        }
        $res = $this->db->get_where('conta', $data);
        return $res->result_array();
    }

    public function delete($data) {
        $this->db->delete('conta', $data);
    }

    public function edita($data) {
        unset($data['month']);
        $this->db->update('conta', $data, 'id = '.$data['id']);
    }

    public function status($data) {
        $sql = "UPDATE conta SET liquidada = MOD(liquidada + 1, 2) WHERE id = ".$data['id'];
        $this->db->query($sql);

        $res = $this->db->get_where('conta', ['id' => $data['id']]);
        print_r($res->row()->liquidada);
    }

    public function total($tipo, $mes, $ano) {
        $conds = ['tipo' => $tipo, 'mes' => $mes, 'ano' => $ano];
        $this->db->select_sum('valor');
        $query = $this->db->get_where('conta', $conds);
        return $query->row()->valor;
    }

    public function saldo($mes, $ano) {
        $rec = $this->total('receber', $mes, $ano);
        $pag = $this->total('pagar', $mes, $ano);
        return $rec - $pag;
    }
}