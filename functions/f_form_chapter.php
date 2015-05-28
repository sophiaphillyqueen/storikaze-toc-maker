<?php

function form_chapter ( $ordr )
{
  $GLOBALS["dispdata"]["chapterid"] = $ordr["contnum"];
  $GLOBALS["dispdata"]["onyet"] = true;
  $reto = "";
  $reto .= "- ";
  if ( $ordr["haslink"] )
  {
    $reto .= "<a href = \"" . $ordr["link"] . "\">";
  }
  $reto .= "Chapter " . $ordr["contnum"];
  if ( $ordr["tset"] )
  {
    $reto .= ": " . htmlspecialchars($ordr["titl"]);
  }
  if ( $ordr["haslink"] )
  {
    $reto .= "</a>";
  }
  $reto .= "\n";
  return $reto;
}

?>