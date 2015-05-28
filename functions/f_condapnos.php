<?php

function condapnos ( $varos, $contos ) {
  if ( ! is_array($GLOBALS["viar"][$varos]) ) { return; } // Don't kill yourself, dear process!!
  
  if ( ! $GLOBALS["viar"][$varos]["stat"] ) { return; }
  $GLOBALS["viar"][$varos]["cont"] .= $contos;
}

?>