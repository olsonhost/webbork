<?php

if ( ! file_exists( "webbork.cfg" ) ) {
	exit( "<h1>Bork!</h1><hr><p>This website has not been configured</p>" );
}

try {

	$CFG = file_get_contents( "webbork.cfg" );

	foreach ( glob( "wb/*.php" ) as $filename ) {
		include $filename;
	}

	foreach ( glob( "wb/lib/*.php" ) as $filename ) {
		include $filename;
	}


	$WB = new WebBork( $CFG );

	if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {

		exit( $WB->handle() );

	}

	exit( $WB->page() );

} catch ( \Exception $e ) {


}
