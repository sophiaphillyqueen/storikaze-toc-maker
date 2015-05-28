<?php

function switch_on($varos) {
  if ( ! is_array($GLOBALS["viar"][$varos]) ) // Don't kill yourself, dear process!!
  {
    $GLOBALS["viar"][$varos] = array("cont" => "", "stat" => true);
    return;
  }
  //echo "\nSwitching On: " . $varos . ":\n";
  $GLOBALS["viar"][$varos]["stat"] = true;
}

?>