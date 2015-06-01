<?php

function form_volume ( $ordr )
{
  $reto = "";
  if ( $GLOBALS["dispdata"]["onyet"] ) { $reto .= "\n"; }
  $GLOBALS["dispdata"]["onyet"] = true;
  
  // The volume-label will always be displayed
  // (except in later versions in cases where the
  // hierarchy does not go that far up).
  
  
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