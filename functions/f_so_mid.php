<?php

function so_mid($la,$ti) {
  $bao = array();
  
  // BEGIN BASEURL-GLEANING LITANY:
  if ( $GLOBALS["locos_flags"]["ourlink"] )
  {
    $GLOBALS["locos_ourlink"] .= $ti;
  }
  // END BASEURL-GLEANING LITANY:
  
  foreach ( $GLOBALS["segmenmean"] as $numo => $valus ) { $boa[$valus] = true; }
  foreach ( $GLOBALS["segmenmean"] as $numo => $valus )
  {
    if ( $boa[$valus] ) { condapnos($valus,$ti); }
    $boa[$valus] = false;
  }
  //condapnos("tlink",$ti);
  //condapnos("content",$ti);
  //condapnos("ourdate",$ti);
  //condapnos("thetitle",$ti);
  //condapnos("posttype",$ti);
  //condapnos("status",$ti);
}

?>