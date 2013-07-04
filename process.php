<?php

// Generate filename
$filename = md5(mt_rand()).'.jpg';

// Read RAW data
$data = file_get_contents('php://input');

// Read string as an image file
$image = file_get_contents('data://'.substr($data, 5));

// Save to disk
if ( ! file_put_contents('uploads/'.$filename, $image)) {
	header('HTTP/1.1 503 Service Unavailable');
	exit();
}

// Clean up memory
unset($data);
unset($image);

// Return file URL
echo './uploads/'.$filename;