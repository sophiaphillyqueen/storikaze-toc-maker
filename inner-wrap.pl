use strict;
use argola;


system("echo","The outer wrapper is from: " . &argola::vrsn . ":");

while ( &argola::yet )
{
  system("echo","Another Arg: " . &argola::getrg . ":");
}


