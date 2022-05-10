<?php

class ButtonGenerator{

  public static function editHandler($row, $url) {
    if($url){
      $html = '<a href="'.$url.'/'.$row['id'].'"><i id="'.$row['id'];
    } else {
      $html  = '<a><i id="'.$row['id'];
    }
    $html .= '"class="fas fa-edit mr-3 ';
    $html .= 'indigo-text edit_btn"></i></a>';
    return $html;

    }


  public static function statusHandler($row) {
    $color = $row['liquidada'] ? 'blue' : 'red';
    $html  = '<a><i id="'.$row['id'];
    $html .= '"class="fas fa-check-circle mr-3 ';
    $html .= $color.'-text pay_btn"></i></a>';
    return $html;
  }


}
