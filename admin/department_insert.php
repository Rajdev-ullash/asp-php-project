<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$dept_name = mysqli_real_escape_string($connection, $_POST["dept_name"]);
	$dept_description = mysqli_real_escape_string($connection, $_POST["dept_description"]);



	//upload image
	$target_dir = "./images/doctor";
	$target_file = $target_dir . basename($_FILES["dept_image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["dept_image"]["tmp_name"]);
	if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		//echo "File is not an image.";
		$uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["dept_image"]["size"] > 500000) {
		//echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["dept_image"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		} else {
			//echo "Sorry, there was an error uploading your file.";
		}
	}

	$dept_order = mysqli_real_escape_string($connection, $_POST["dept_order"]);





	$query = "INSERT INTO department (dname, description, image, ord) VALUES ('$dept_name', '$dept_description', '$target_file', '$dept_order')";

	if(mysqli_query($connection, $query)){
		
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			echo json_encode($output);
			echo $output;
	}

?>
