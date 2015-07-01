<?php

function form_episode ( $ordr )
{
  $reto = "";
  $GLOBALS["dispdata"]["onyet"] = true;
  $reto .= "- - - ";
  if ( $ordr["haslink"] )
  {
    $reto .= "<a href = \"" . $ordr["link"] . "\">";
  }
  $reto .= "Episode " . $GLOBALS["dispdata"]["chapterid"] . "." . $ordr["contnum"];
  if ( $ordr["tset"] )
  {
    $reto .= ": <i>" . htmlspecialchars($ordr["titl"]) . "</i>";
  }
  if ( $ordr["haslink"] )
  {
    $reto .= "</a>";
  }
  $reto .= " <i>(" . htmlspecialchars($ordr["pubdate"]) . ")</i>";
  $reto .= "\n";
  return $reto;
}

?>