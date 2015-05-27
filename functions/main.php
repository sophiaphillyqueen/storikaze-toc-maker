<?php


require_once(dirname(__FILE__) . "/f_time_adjust_set.php");
require_once(dirname(__FILE__) . "/f_acknowledge.php");
require_once(dirname(__FILE__) . "/f_eachlevelcont.php");


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

function so_out($la,$ti) {
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

function so_mid($la,$ti) {
  $bao = array();
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

function switch_on($varos) {
  if ( ! is_array($GLOBALS["viar"][$varos]) ) // Don't kill yourself, dear process!!
  {
    $GLOBALS["viar"][$varos] = array("cont" => "", "stat" => true);
    return;
  }
  //echo "\nSwitching On: " . $varos . ":\n";
  $GLOBALS["viar"][$varos]["stat"] = true;
}

function switch_off($varos) {
  if ( ! is_array($GLOBALS["viar"][$varos]) ) // Don't kill yourself, dear process!!
  {
    $GLOBALS["viar"][$varos] = array("cont" => "", "stat" => false);
    return;
  }
  //echo "\nSwitching Off: " . $varos . ":\n";
  $GLOBALS["viar"][$varos]["stat"] = false;
}

function condapnos ( $varos, $contos ) {
  if ( ! is_array($GLOBALS["viar"][$varos]) ) { return; } // Don't kill yourself, dear process!!
  
  if ( ! $GLOBALS["viar"][$varos]["stat"] ) { return; }
  $GLOBALS["viar"][$varos]["cont"] .= $contos;
}


// -----

require_once(dirname(__FILE__) . "/f_process_item.php");
require_once(dirname(__FILE__) . "/f_extract_info.php");




?>