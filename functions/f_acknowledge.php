<?

function acknowledge ( $table_old, $newlocbar, $xtrinfo )
{
  if ( count($newlocbar) < 0.5 ) { return $table_old; }
  
  // First - we get the structure of what we are referring to.
  $thislevel = array_pop($newlocbar);
  $whichnum = ((int)(($thislevel["num"]) + 0.2));
  $whichinx = "nm" . $whichnum;
  
  if ( ! isset($table_old[$whichinx]) )
  {
    $table_old[$whichinx] = array(
      "denom" => $thislevel["denom"],
      
      // By default - the title is not set.
      "tset" => false,
      
      // We assume all is published unless we find something that isn't
      "allpub" => true,
      "anypub" => false,
      
      // Some indication of level by number
      "lvidn" => count($newlocbar),
      
      // We will use the publication date of the first-introduced element
      // as our starting-point in searching for the publication date
      // of the first-published element.
      "pubdate" => $xtrinfo["pubdate"],
      
      // What about the sub-elements in the TOC?
      //"cont" => array(),
      
    );
  }
  $curta = $table_old[$whichinx];
  
  // Let us see if we have an earlier date than previously thought.
  if ( strtotime($curta["pubdate"]) > strtotime($xtrinfo["pubdate"]) )
  {
    $curta["pubdate"] = $xtrinfo["pubdate"];
  }
  
  
  // Let us set the title if it is time to do so.
  // (Later versions might complain of duplicate info.)
  if ( $thislevel["tset"] )
  {
    $curta["titl"] = $thislevel["titl"];
    $curta["tset"] = true;
  }
  
  
  // Make sure we know if this piece is not yet 100% published.
  if ( ! $xtrinfo["pubyet"] )
  {
    $curta["allpub"] = false;
  }
  if ( $xtrinfo["pubyet"] )
  {
    $curta["anypub"] = true;
  }
  
  
  
  if ( count($newlocbar) < 0.5 )
  {
    $curta["link"] = $xtrinfo["link"];
    $curta["pubrdate"] = $xtrinfo["pubrdate"];
    $curta["postidn"] = $xtrinfo["postidn_a"];
    $curta["postname"] = $xtrinfo["postname"];
    $curta["pubyet"] = $xtrinfo["pubyet"];
    
    $curta["partno"] = $whichnum;
    $table_old[$whichinx] = $curta;
    return $table_old;
  }
  
  
  // Last but not least, let us do our recursive job.
  if ( ! isset($curta["cont"]) ) { $curta["cont"] = array(); }
  $curta["cont"] = acknowledge ( $curta["cont"], $newlocbar, $xtrinfo );
  
  $curta["partno"] = $whichnum;
  $table_old[$whichinx] = $curta;
  return $table_old;
}

?>
