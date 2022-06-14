<?php

include_once APPPATH . 'libraries/padrao/interfaces/CarBuilder.php';

class SportCar implements CarBuilder{

  private $description = '';

  public function reset(){
    $this->description = '';
  }

  public function setSeats($number){
    $this->description .= "Carro para $number pessoas<br>";
  }

  public function setEngine($type){
    $this->description .= "Com motor $type<br>";
  }

  public function setTripComputer($name){
    $this->description .= "Computador de bordo: $name<br>";
  }

  public function setGPS($name){
    $this->description .= "Nunca se perca com o GPS $name<br>";
  }

  public function sunRoof(){
    $this->description .= "Veja o céu azul pelo teto solar!";
  }

  public function getResult($carName){
    $descr = "O $carName é tudo de bom!<br>";
    return $descr . $this->description;
  }

}


?>
