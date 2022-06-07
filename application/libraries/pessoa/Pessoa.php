<?php

  abstract class Pessoa {

    private $nome;

    function __construct($nome){
      $this->nome = $nome;
    }

    public function getNome()
    {
      return $this->nome;
    }

    protected function falar($frase) {
      echo $this->getTime(). ' - ' . $frase. '<br>';
    }

    private getTime() {
      return date('H:i');
    }

    abstract function frequencia() {

    }
  }

?>
