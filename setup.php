<?php

parse_str(implode('&', array_slice($argv, 1)), $kolar);
//var_dump($kolar);

$banju = 0;

$segmenmean = array(
  "CONTENT:ENCODED" => "content",
  "TITLE" => "title",
  "LINK" => "link",
  "PUBDATE" => "showdate",
  "WP:POST_TYPE" => "posttype",
  "WP:STATUS" => "status",
  "WP:POST_DATE" => "postdate"
);
$viar = array();

?>