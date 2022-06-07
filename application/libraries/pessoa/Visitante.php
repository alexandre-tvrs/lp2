<?php
include 'Pessoa.php';

class Visitante extends Pessoa {

  public frequencia(){
    return random_int(0, 6);
  }

}

?>
