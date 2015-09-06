<?php

function form_part ( $ordr )
{
  $reto = "";
  if ( $GLOBALS["dispdata"]["onyet"] ) { $reto .= "\n"; }
  $GLOBALS["dispdata"]["onyet"] = true;
  if ( $ordr["haslink"] )
  {
    $reto .= "<a href = \"" . $ordr["link"] . "\">";
  }
  $reto .= "Part " . $ordr["contnum"];
  if ( $ordr["tset"] )
  {
    $reto .= ": <b>" . htmlspecialchars($ordr["titl"]) . "</b>";
  }
  if ( $ordr["haslink"] )
  {
    $reto .= "</a>";
  }
  $reto .= "\n";
  return $reto;
}

?>