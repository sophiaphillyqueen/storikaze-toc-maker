<?php

function process_item ( ) {
  if ( $GLOBALS["viar"]["status"]["cont"] == "trash" ) { return; }
  if ( $GLOBALS["viar"]["posttype"]["cont"] != "post" ) { return; }
  //echo "\n------------------------------------------------------------------\n";
  //echo $GLOBALS["viar"]["title"]["cont"] . "\n";
  //echo $GLOBALS["viar"]["link"]["cont"] . "\n";
  //echo $GLOBALS["viar"]["postdate"]["cont"] . "\n";
  //echo time_adjust_set($GLOBALS["viar"]["postdate"]["cont"]) . "\n";
  //echo $GLOBALS["viar"]["status"]["cont"] . "\n";
  
  
  
  //echo "\n---gl viar---\n"; var_dump($GLOBALS["viar"]); // sleep(1);
  
  $conto = $GLOBALS["viar"]["content"]["cont"];
  $inform = extract_info($conto);
  //echo $inform . "\n";
  $infolins = explode("\n",$inform);
  
  
  $infostruct = array();
  foreach ( $GLOBALS["cont_levels"] as $levinfo )
  {
    $infostruct[] = array(
      "denom" => $levinfo[0], // The name of the particular level
      "num" => $levinfo[1], // The default number of the numlevel
      "tset" => false       // True only if the title is already set (default is false)
      // "titl" will be set as the name of the title once it is set
    );
  }
  
  $specinfo = array(
    "pubyet" => ( $GLOBALS["viar"]["status"]["cont"] == "publish" ),
    "pubdate" => time_adjust_set($GLOBALS["viar"]["postdate"]["cont"]), // Actual TOC herald time
    "pubrdate" => $GLOBALS["viar"]["postdate"]["cont"], // May be needed for permalinking
    "link" => $GLOBALS["viar"]["link"]["cont"],
    "postname" => $GLOBALS["viar"]["postcname"]["cont"], // May also be needed for permalinking
    "postidn_a" => $GLOBALS["viar"]["postidnum"]["cont"], // May be needed for shortcode referencing
  );
  
  
  foreach ( $infolins as $infoline )
  {
    $infoslins = explode("\r",$infoline);
    foreach ( $infoslins as $infosline )
    {
      $infosegs = explode(":",$infosline,4);
      if ( $infosegs[0] == "level" )
      {
        $mathlevel = ((int)($infosegs[1] - 0.8));
        
        // Got to make sure that the mathlevel isn't higher than
        // what is allowed:
        if ( $mathlevel > ( $GLOBALS["cont_max_level"] - 0.5 ) )
        {
          echo "\n-------- FORBIDDEN: level above " . $GLOBALS["cont_max_level"] . ":\n\n";
          return;
        }
        
        
        // This previous form did not allow the safety
        // semicolon:
        //$infostruct[$mathlevel]["num"] = $infosegs[2];
        
        // But maybe this new form will
        $intrameda = explode(";",$infosegs[2]);
        $infostruct[$mathlevel]["num"] = $intrameda[0];
        
        
        
        
        if ( $infosegs[3] )
        {
          $infostruct[$mathlevel]["titl"] = $infosegs[3];
          $infostruct[$mathlevel]["tset"] = true;
        }
      }
    }
  }
  
  $GLOBALS["cont_table"] = acknowledge($GLOBALS["cont_table"],$infostruct,$specinfo);
  
  //echo "\n---newlocbar---\n"; var_dump($infostruct); // sleep(1);
  //echo "\n---xtrinfo---\n"; var_dump($specinfo); // sleep(1);
  //echo "\n---CONT---\n"; var_dump($GLOBALS["cont_table"]); // sleep(1);
  
  
  //var_dump($infostruct); // sleep(3);
}

?>