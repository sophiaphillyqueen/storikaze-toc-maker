<?php

function switch_off($varos) {
  if ( ! is_array($GLOBALS["viar"][$varos]) ) // Don't kill yourself, dear process!!
  {
    $GLOBALS["viar"][$varos] = array("cont" => "", "stat" => false);
    return;
  }
  //echo "\nSwitching Off: " . $varos . ":\n";
  $GLOBALS["viar"][$varos]["stat"] = false;
}

?>