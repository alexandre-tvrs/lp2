<?php
include APPPATH . 'libraries/pessoa/Aluno.php';
include APPPATH . 'libraries/pessoa/Funcionario.php';
include APPPATH . 'libraries/pessoa/Professor.php';
include APPPATH . 'libraries/pessoa/Visitante.php';

class PooModel extends CI_Model
{

  function polimorfismo()
  {
    $joao = new Aluno('João');
    $pedro = new Aluno('Pedro');
    $paulo = new Aluno('Paulo');

    $marcia = new Professor('Marcia');
    $marta = new Professor('Marta');

    $jose = new Funcionario('José');
    $joselito = new Funcionario('Joselito');
    $manoel = new Funcionario('Manoel');
    $cida = new Funcionario('Cida');

    $v1 = new Visitante('Visitante 1');
    $v2 = new Visitante('Visitante 2');
    $v3 = new Visitante('Visitante 3');

    $v = [$joao, $pedro, $paulo, $marcia, $marta, $jose,   $joselito, $manoel, $cida, $v1, $v2, $v3];

    foreach ($v as $pessoa) {
      echo $pessoa->getNome().' - ' . $pessoa->falar('Oi! Eu venho ao câmpus '). $pessoa->frequencia(). ' vezes por semana!<br>';
    }

  }

}


?>
