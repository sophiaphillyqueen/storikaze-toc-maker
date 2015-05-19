use strict;
use argola;

my $foundsource = 0;
my $issource;

#system("echo","The outer wrapper is from: " . &argola::vrsn . ":");

while ( &argola::yet ) { &anotharg; }
#{
#  system("echo","Another Arg: " . &argola::getrg . ":");
#}
sub anotharg {
  my $lc_arg;
  
  $lc_arg = &argola::getrg;
  
  if ( $foundsource < 5 )
  {
    $issource = $lc_arg;
    $foundsource = 10;
    return;
  }
  die "\nMore than one source-file is just too much.\n\n";
}

if ( $foundsource < 0 ) { die "\nNo source-file specified:\n\n"; }

exec("php",&argola::srcd . "/main.php", "source=" . $issource);


