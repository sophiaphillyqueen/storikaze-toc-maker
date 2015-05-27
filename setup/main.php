<?php

parse_str(implode('&', array_slice($argv, 1)), $kolar);
//var_dump($kolar);

// In future versions, there will probably be a way to over-ride the
// default timezone in which this program runs. However, adding this
// option is a low priority because (with very rare possible exceptions)
// this program's ability to produce proper results will not depend
// on *what* timezone it is operating on -- but rather, only on the
// fact that it picks *one* timezone and uses it *consistently*
// throughout it's run.
//   However, since those exceptions (cases in which the timezone
// actually *does* affect the results) however rare, may still
// actually *exist* -- for that reason, allowing an option to
// over-ride this program's default has a place on the to-do list.
// Just not a very *high* place on the to-do list.
//   In the mean time, it is advised that you refrain from
// scheduling any installments of your story to go live at hours
// anywhere *near* the section of the day that can be affected
// by weird things such as changes in and out of Daylight Savings
// Time.
date_default_timezone_set('America/New_York');

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

// The following array contains flow data for knowing where
// we are in procesing various entities within the XML output.
$viar = array();


$cont_levels = array(
  array("Episode",1),
  array("Chapter",1),
  array("Part",1),
  array("Volume",1)
);

?>