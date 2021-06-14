<?php

namespace App\Service;

class TypesCocktails{

  private $types = array(''=>'','ld'=>'long drink','sd'=>'short drink','sa'=>'sans alcool');

  public function loadTypeParam($code = ''){
    if(!isset($this->types[$code])){
      $code = '';
    }
    $nom = $this->types[$code];
    $link = '/'.str_replace(' ', '-', $this->types[$code]);
    return (array) [
      'nom' => $nom,
      'code' => $code,
      'link' => $link
    ];
  }

}
