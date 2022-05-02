<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Contas extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('ContasModel', 'conta');
    }

    public function index(){
        $html = $this->conta->listaCompleta();
        $this->show($html);
    }

    public function pagar($mes = 0, $ano = 0) {
        $this->defineMonth($mes, $ano);
        $this->conta->cria('pagar');

        $v['lista'] = $this->conta->lista('pagar', $mes, $ano);
        $v['tipo'] = 'pagar';

        $html = $this->load->view('contas/lista_contas', $v, true);
        $this->show($html);
    }

    public function receber($mes = 0, $ano = 0) {
        $this->defineMonth($mes, $ano);

        $this->conta->cria('receber');
        $v['lista'] = $this->conta->lista('receber', $mes, $ano);
        $v['tipo'] = 'receber';

        $html = $this->load->view('contas/lista_contas', $v, true);
        $this->show($html);
    }

    public function movimento($mes = 0, $ano = 0) {
        $this->defineMonth($mes, $ano);

        $v['lista'] = $this->conta->lista('mista', $mes, $ano);
        $html = $this->load->view('contas/lista_contas', $v, true);

        $this->show($html);
    }

    private function defineMonth(&$mes, &$ano) {
        $mes = $mes ? $mes : date('m');
        $ano = $ano ? $ano : date('Y');
        $_POST['month'] = "$ano-$mes";
    }
}