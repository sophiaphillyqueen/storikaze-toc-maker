<?php


function so_out($la,$ti) {
  
  // BEGIN BASEURL-GLEANING LITANY:
  
  $barok = ( $ti == "LINK" );
  if ( $barok ) { $barok = $GLOBALS["locos_flags"]["ourlink"]; }
  if ( $barok )
  {
    $GLOBALS["locos_flags"]["ourlink"] = false;
  }
  
  $barok = ( $ti == "ITEM" );
  if ( $barok )
  {
    $GLOBALS["locos_flags"]["item"] = false;
  }
  
  // END BASEURL-GLEANING LITANY:
  
  if ( $ti == "ITEM" )
  {
    process_item();
    return;
  }
  
  foreach ( $GLOBALS["segmenmean"] as $nomo => $vula )
  {
    if ( $ti == $nomo )
    {
      switch_off($vula);
      return;
    }
  }
}

?>