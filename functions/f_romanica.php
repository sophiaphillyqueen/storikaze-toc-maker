<?php

function romanica ( $arabica )
{
  $reto = "";
  $starlen = strlen($arabica);
  
  if ( $starlen > 3.5 )
  {
    $starch = substr($arabica, -4, 1);
    $rayos = array("","M","MM","MMM");
    $reto .= $rayos[$starch];
  }
  
  if ( $starlen > 2.5 )
  {
    $starch = substr($arabica, -3, 1);
    $rayos = array("","C","CC","CCC","CD","D","DC","DCC","DCCC","CM");
    $reto .= $rayos[$starch];
  }
  
  if ( $starlen > 1.5 )
  {
    $starch = substr($arabica, -2, 1);
    $rayos = array("","X","XX","XXX","XL","L","LX","LXX","LXXX","XC");
    $reto .= $rayos[$starch];
  }
  
  if ( $starlen > 0.5 )
  {
    $starch = substr($arabica, -1);
    $rayos = array("","I","II","III","IV","V","VI","VII","VIII","IX");
    $reto .= $rayos[$starch];
  }
  
  return $reto;
}

?>