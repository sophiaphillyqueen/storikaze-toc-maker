<?php

function so_in($la,$ti,$da) {
  // Let us set the immediate clear if we are entering an ITEM field:
  if ( $ti == "ITEM" )
  {
    $coros = array("cont" => "", "stat" => false);
    foreach ( $GLOBALS["segmenmean"] as $numos => $valus )
    {
      $GLOBALS["viar"][$valus] = $coros;
    }
    return;
  }
  
  foreach ( $GLOBALS["segmenmean"] as $nomo => $vula )
  {
    if ( $ti == $nomo )
    {
      switch_on($vula);
      return;
    }
  }
}

?>