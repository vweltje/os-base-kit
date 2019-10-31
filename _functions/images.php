<?php
///////////////////////////////////////////////////////
// Image sizes
// add_image_size( '400x400', 400, 400, true );
add_image_size( '400w', 400, 0, false );
// add_image_size( '600x600', 600, 600, true );
add_image_size( '600w', 600, 0, false );
// add_image_size( '800x800', 800, 800, true );
add_image_size( '800w', 800, 0, false );
// add_image_size( '1200x1200', 1200, 1200, true );
add_image_size( '1200w', 1200, 0, false );
// add_image_size( '1800x1800', 1800, 1800, true );
add_image_size( '1800w', 1800, 0, false );

//////////////////////////////////////////////////////
// Image quality
function gpp_jpeg_quality_callback($arg) {
    return (int)75; // change 100 to whatever you prefer, but don't go below 60
}
add_filter('jpeg_quality', 'gpp_jpeg_quality_callback');
?>
