<?php
// You'll need the Composer Autoloader.
require 'vendor/autoload.php';

// You may alias the classnames for convenience.
use StubsGenerator\{StubsGenerator, Finder};

// First, instantiate a `StubsGenerator\StubsGenerator`.
$generator = new StubsGenerator();

// Then, create a `StubsGenerator\Finder` which contains
// the set of files you wish to generate stubs for.
$finder = Finder::create()->in( 'flatsome' );

// Now you may use the `StubsGenerator::generate()` method,
// which will return a `StubsGenerator\Result` instance.
$result = $generator->generate( $finder );

// You can use the `Result` instance to pretty-print the stubs.
$file = fopen( 'flatsome-stubs.php', 'w' );
fwrite(
	$file,
	"<?php\n/**\n * Generated stub declarations for Flatsome.\n * http://flatsome.uxthemes.com\n * https://github.com/aarsteinmedia/flatsome-stubs\n */" .
	str_replace('<?php', '', $result->prettyPrint()),
);
fclose( $file );
