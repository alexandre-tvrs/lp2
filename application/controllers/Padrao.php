<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Padrao extends MY_Controller{

  public function builder(){

    $this->load->model('CarroModel', 'carro');
    $html = $this->carro->makeSports('veyron');
    $html .= '<br>';
    $html .= $this->carro->makeSports2('teste');

    $this->show($html);
  }

}


?>
