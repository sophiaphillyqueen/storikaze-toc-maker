<?php





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


?>