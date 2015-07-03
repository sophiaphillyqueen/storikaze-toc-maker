<?php


function eachlevelcont ( $prebuf, $contray )
{
  $reto = "";
  foreach ( $contray as $contnum => $contdat )
  {
    // Find the Link to the Destination
    $linkos = isset($contdat["link"]);
    if ( $linkos )
    {
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
    }
    
    $futuro = ( ! ( $contdat["anypub"] ) );
    if ( $futuro )
    {
      $reto .= "[storikaze_at from = \"";
      $reto .= $contdat["pubdate"];
      $reto .= "\"]";
      amongalltime($contdat["pubdate"]);
    }
    
    
    
    
    
    $texorder = array(
      "haslink" => $linkos,
      "contnum" => $contnum,
      "tset" => $contdat["tset"],
      "pubdate" => strftime("%A, %B %e, %Y",strtotime($contdat["pubdate"])),
    );
    if ( $contdat["tset"] )
    {
      $texorder["titl"] = $contdat["titl"];
    }
    if ( $linkos )
    {
      $texorder["link"] = $destilink;
    }
    if ( $contdat["lvidn"] < 0.5 )
    {
      $texorder["link"] = "{{plink:" . $contdat["postidn"] . "}}";
    }
    $levidon = $contdat["lvidn"];
    $leviway = $GLOBALS["cont_levels"][$levidon][2];
    $notyetway = true;
    if ( $notyetway )
    {
      if ( $leviway[0] == "f" )
      {
        $levifun = $leviway[1];
        $reto .= $levifun($texorder);
      }
    }
    
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