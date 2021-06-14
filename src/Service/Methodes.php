<?php

namespace App\Service;

class Methodes{

  public 	$methodes = array(0=>'',1=>'',2=>'Verre à mélange',3=>'Shaker',4=>'Mixeur');

  public function getMethode($code = 0){
    return $this->methodes[$code];
  }

}
