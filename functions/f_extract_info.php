<?php

function extract_info ( $conto ) {
  $reto = "";
  $lefto = $conto;
  while ( $lefto != "" )
  {
    $splito = explode("[storikaze_info]",("x" . $lefto),2);
    $gaino = explode("[/storikaze_info]",$splito[1],2);
    $reto .= $gaino[0] . "\n";
    $lefto = $gaino[1];
  }
  return $reto;
}

?>