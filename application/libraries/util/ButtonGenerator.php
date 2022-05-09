<<?php

class ButtonGenerator{

  public static function editHandler($row) {
      $html  = '<a><i id="'.$row['id'];
      $html .= '"class="fas fa-edit mr-3 ';
      $html .= 'indigo-text edit_btn"></i></a>';
      return $html;
    }

}

 ?>
