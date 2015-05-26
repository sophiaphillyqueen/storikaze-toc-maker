<?php

function process_item ( ) {
  if ( $GLOBALS["viar"]["status"]["cont"] == "trash" ) { return; }
  if ( $GLOBALS["viar"]["posttype"]["cont"] != "post" ) { return; }
  echo "\n------------------------------------------------------------------\n";
  echo $GLOBALS["viar"]["title"]["cont"] . "\n";
  echo $GLOBALS["viar"]["link"]["cont"] . "\n";
  echo $GLOBALS["viar"]["postdate"]["cont"] . "\n";
  echo time_adjust_set($GLOBALS["viar"]["postdate"]["cont"]) . "\n";
  echo $GLOBALS["viar"]["status"]["cont"] . "\n";
  
  $conto = $GLOBALS["viar"]["content"]["cont"];
  $inform = extract_info($conto);
  #echo $inform . "\n";
  $infolins = explode("\n",$inform);
  $infotitle = array();
  foreach ( $infolins as $infoline )
  {
    $infoslins = explode("\r",$infoline);
    foreach ( $infoslins as $infosline )
    {
      $infosegs = explode(":",$infosline,4);
      if ( $infosegs[0] == "level" )
      {
        if ( $infosegs[3] )
        {
          $infotitle["l:" . $infosegs[1]] = $infosegs[3];
        }
      }
    }
  }
}

?>