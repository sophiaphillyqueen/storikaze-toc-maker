<?php

function amongalltime ( $thisonetime )
{
  foreach ( $GLOBALS["alltimes"] as $anothertime )
  {
    if ( $thisonetime == $anothertime ) { return; }
  }
  $GLOBALS["alltimes"][] = $thisonetime;
}


?>