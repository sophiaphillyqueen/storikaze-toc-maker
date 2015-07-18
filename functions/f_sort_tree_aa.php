<?php

function sort_tree_aa ( $intree )
{
  $outtree = array();
  
  foreach ( $intree as $flkey => $flstuff )
  {
    $flpstuff = $flstuff;
    
    if ( is_array($flstuff["cont"]) )
    {
      $flpstuff["cont"] = sort_tree_aa($flstuff["cont"]);
    }
    
    
    $outtree[$flkey] = $flpstuff;
  }
  
  usort($outtree,$GLOBALS[$sort_tree_ab]);
  return $outtree;
}

?>