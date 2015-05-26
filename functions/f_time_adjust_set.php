<?php

function time_adjust_set ( $srctime )
{
  $rawold = strtotime($srctime);
  $rawnew = ((int)($rawold + 90.2));
  $texnew = date("Y-m-d H:i:s", $rawnew);
  return $texnew;
}

?>