<?php
include 'Funcionario.php';

class Professor extends Funcionario {

  function frequencia() {
      return 3 | 4 | 5;
  }

  function departamento() {
    return 'ensino';
  }

  function disciplina() {
    return 'Nome da disciplina';
  }

}

?>
