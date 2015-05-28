<?php


function eachlevelcont ( $prebuf, $contray )
{
  $reto = "";
  foreach ( $contray as $contnum => $contdat )
  {
    // Find the Link to the Destination
    $destilink = $contdat["link"];
    if ( ! ( $contdat["pubyet"] ) )
    {
      $destilink = $GLOBALS["locos_ourlink"];
      $venisa = explode(" ",$contdat["pubrdate"]);
      $venisb = explode("-",$venisa[0]);
      
      $destilink .= "/" . $venisb[0];
      $destilink .= "/" . $venisb[1];
      $destilink .= "/" . $venisb[2];
      $destilink .= "/" . $contdat["postname"] . "/";
    }
    
    $futuro = ( ! ( $contdat["anypub"] ) );
    $linkos = isset($contdat["link"]);
    if ( $futuro )
    {
      $reto .= "[storikaze_at from = \"";
      $reto .= $contdat["pubdate"];
      $reto .= "\"]";
      amongalltime($contdat["pubdate"]);
    }
    if ( $contdat["lvidn"] > 1.5 ) { $reto .= "\n"; }
    if ( $contdat["lvidn"] > 0.5 ) { $reto .= "<b>"; }
    
    $reto .= $prebuf;
    if ( $linkos ) { $reto .= "<a href = \"" . $destilink . "\">"; }
    
    $reto .= $contdat["denom"];
    $reto .= " " . htmlspecialchars($contnum);
    if ( $contdat["tset"] )
    {
      $reto .= ": " . htmlspecialchars($contdat["titl"]);
    }
    
    if ( $linkos ) { $reto .= "</a>"; }
    
    if ( $contdat["lvidn"] > 0.5 ) { $reto .= "</b>"; }
    $reto .= "\n";
    
    if ( $futuro )
    {
      $reto .= "[/storikaze_at]";
    }
    
    if ( isset($contdat["cont"]) )
    {
      $reto .= eachlevelcont ( ( $prebuf . "- " ), $contdat["cont"] );
    }
  }
  
  return $reto;
}


?>