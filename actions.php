<?php


$cont_max_level = count($cont_levels);

$cont_table = array();

$locos_flags = array(
  "item" => false,
  "ourlink" => false
);
$locos_ourlink = "";



if ( ! is_string($kolar["source"]) )
{
  die("\nCan not find it\n\n");
}
if ( ! $infile = fopen($kolar["source"],"r") )
{
  die("\nCound not read file: " . $kolar["source"] . ":\n\n");
}




$parco = xml_parser_create();
xml_set_element_handler($parco,"so_in","so_out");
xml_set_character_data_handler($parco,"so_mid");

while ( $data = fread($infile,4096) ) {
  xml_parse($parco,$data,feof($infile)) or die(sprintf("XML Error: %s at line %e",
  xml_error_string(xml_get_error_code($parco)),
  xml_get_current_line_number($parco)));
}


fclose($infile);



$alltimes = array();


echo "\n\n" . '# TABLE OF CONTENTS:
# The following section of code is meant to be copy/pasted
# onto the page that is used as the Table of Contents.';

$dispdata = array();
echo "\n\n" . eachlevelcont("",$cont_table) . "\n\n";

echo "<p>Check back for the next installment in [storikaze_until]";
$previa = false;
foreach ( $alltimes as $allgea )
{
  if ( $previa ) { echo "/"; }
  echo $allgea;
  $previa = true;
}
echo "[/storikaze_until]!!!</p>\n\n";


// Now let us generate a tag list for the first section
// of the soon-to-be-implemented [storikaze_history]
// shortcode.
echo "\n\n" . '# HISTORY TAGS:
# Now comes the history tag list. The tags here will go
# inside the content of a [storikaze_history] shortcode
# -- specifically the *first* part of it\'s content
# (separated from the rest of the content by the content\'s
# first vertical bar (\'|\')).';


echo "\n\n" . taglistero_a($cont_table);
echo "\n\n";


?>