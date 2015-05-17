# storikaze-toc-maker
A command-line tool to generate Table of Contents code from an XML-Export of a Storikaze-enabled Wordpress

## Required Technologies
Both PERL and PHP are required for this tool to work. The core program is implemented in PHP, but it is surrounded by a wrapper written in PERL that parses the command-line arguments passed to the program into a format that is easy for PHP scripts to digest.

This first wrapper is surrounded by yet _another_ wrapper (also written, for the time being, in PERL) who's sole purposes are to be the command's presence on the command-line-tool execution path and to reference the custom-PERL-module directory.

One might wonder why use two PERL wrappers rather than just one. The reason is that the inner wrapper (that does all the parsing of the command-line arguments) may require updates frequently to stay compatible with the development of the PHP core. Using that wrapper _also_ as the presence of this tool on the command-line execution path would require the installation procedure to repeat very frequently - every time a change was made in how this parsing needs to be done. The outer wrapper, on the other hand, will seldom if ever change -- and hopefully, should allow a very _significant_ grace period if it ever _does_ change --- and therefore the installation procedure will rarely, if ever, need to be repeated.

The inner wrapper, of course, should require no more effort to keep up-to-date than the standard __git pull__.