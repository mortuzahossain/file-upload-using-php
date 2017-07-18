<?php
if (isset($_FILES['file'])) {
	$file = $_FILES['file'];
print_r($file);

	// File Properties
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];

	// File Extention
	$file_extention = explode('.', $file_name);
	$file_extention = strtolower(end($file_extention));

	// Allowed File Type
	$allowed = array('txt','jpg','zip','pdf','php');

	if (in_array($file_extention,$allowed)) {
		if ($file_error === 0) {
			if ($file_size <= 100000000) {
				$file_name_new = uniqid('',true). '.' .$file_extention;
				// In Server Where Want to save the file
				$file_destinition = '/wamp/www/upload_file/save/'.$file_name_new;
				//echo $file_destinition;
				if (move_uploaded_file($file_tmp, $file_destinition)) {
					echo $file_destinition;
				}
			}
		}
	}


}
?>