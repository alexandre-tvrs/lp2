<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarroModel extends CI_Model{

  public function makeSports($modelo){
    $this->load->library('padrao/builder/SportCar');
    $this->sportcar->setSeats(2);
    $this->sportcar->setEngine('GRX');
    $this->sportcar->setTripComputer('Windows 11 Special Edition');
    $this->sportcar->setGPS('Google Maps');
    return $this->sportcar->getResult($modelo);
  }

  public function makeSports2($modelo){
    $this->load->library('padrao/builder/SportCar');
    $this->sportcar->reset();
    $this->sportcar->setEngine('VHC');
    $this->sportcar->setSeats(4);
    $this->sportcar->sunRoof();
    return $this->sportcar->getResult($modelo);
  }

}


 ?>
