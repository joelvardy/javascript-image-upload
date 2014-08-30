<?php

$filename = md5(mt_rand()).'.jpg';
$status = (boolean) move_uploaded_file($_FILES['photo']['tmp_name'], './images/'.$filename);

$response = (object) [
	'status' => $status
];

if ($status) {
	$response->url = './images/'.$filename;
}

echo json_encode($response);
