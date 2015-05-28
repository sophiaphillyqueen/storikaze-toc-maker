<?php

function form_volume ( $ordr )
{
  $reto = "";
  if ( $GLOBALS["dispdata"]["onyet"] ) { $reto .= "\n"; }
  $GLOBALS["dispdata"]["onyet"] = true;
  
  // Is there a reason to stick around for printing the volume header?
  $nobother = true;
  if ( $ordr["haslink"] ) { $nobother = false; }
  if ( $ordr["tset"] ) { $nobother = false; }
  
  // Later, I will add presence of multiple volumes as a reason to
  // bother printing the volume header.
  // Now, if no reason to print the volume header is found, then don't
  // bother.
  if ( $nobother ) { return $reto; }
  
  
  if ( $ordr["haslink"] )
  {
    $reto .= "<a href = \"" . $ordr["link"] . "\">";
  }
  $reto .= "<b>Volume " . romanica($ordr["contnum"]);
  if ( $ordr["tset"] )
  {
    $reto .= ": " . htmlspecialchars($ordr["titl"]) . "";
  }
  if ( $ordr["haslink"] )
  {
    $reto .= "</a>";
  }
  $reto .= "</b>\n";
  return $reto;
}

?>