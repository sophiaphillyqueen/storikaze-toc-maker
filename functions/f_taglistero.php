<?php

function taglistero_a ( $caray )
{
  $lc_ret = "";
  foreach ( $caray as $unitos )
  {
    $lc_ret .= taglistero_b($unitos);
  }
  return $lc_ret;
}

function taglistero_b ( $unitos )
{
  if ( $unitos["lvidn"] > 0.5 )
  {
    return taglistero_a($unitos["cont"]);
  }
  $reto = "-FUTURE";
  if ( $unitos["pubyet"] ) { $reto = "- now -"; }
  $divisor = ":";
  
  $reto .= ": {{post" . $divisor . $unitos["postidn"];
  $reto .= $divisor . $unitos["pubdate"] . "}}";
  
  $reto .= "\n";
  return $reto;
}

?>