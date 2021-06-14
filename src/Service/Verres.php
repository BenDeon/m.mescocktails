<?php

namespace App\Service;

class Verres{

  public 	$verres=array(
    0=>'Verre',
    1=>'Verre à cocktail',
    2=>'Verre old fashioned',
    3=>'Tumbler',
    4=>'Flûte',
    5=>'Shooter',
    6=>'Verre à dégustation',
    7=>'Coupe à champagne',
    8=>'Ballon',
    9=>'Verre à margarita',
    10=>'Verre fantaisie',
    11=>'Verre à whisky');

  public function getVerre($code = 0){
    return $this->verres[$code];
  }

}
