package argola;
use strict;

my @argbuft;
my @argbufp;
my $versono;

@argbuft = @ARGV;
$versono = &getrg;
@argbufp = @argbuft;


sub getrg {
  my $lc_a;
  my $lc_ret;
  $lc_a = @argbuft;
  $lc_ret = "";
  if ( $lc_a > 0.5 ) { $lc_ret = shift(@argbuft); }
  return $lc_ret;
}

sub rset {
  @argbuft = @argbufp;
}

sub vrsn {
  return $versono;
}

sub yet {
  my $lc_a;
  $lc_a = @argbuft;
  return ( $lc_a > 0.5 );
}



1;
