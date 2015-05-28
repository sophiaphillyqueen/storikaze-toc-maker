<?php

function so_in($la,$ti,$da) {
  
  // BEGIN BASEURL-GLEANING LITANY:
  
  $barok = ( $ti == "LINK" );
  if ( $barok )
  {
    $barok = ( ! ( $GLOBALS["locos_flags"]["item"] ) );
  }
  if ( $barok )
  {
    $GLOBALS["locos_flags"]["ourlink"] = true;
    $GLOBALS["locos_ourlink"] = "";
  }
  
  $barok = ( $ti == "ITEM" );
  if ( $barok )
  {
    $GLOBALS["locos_flags"]["item"] = true;
  }
  
  // END BASEURL-GLEANING LITANY:
  
  
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