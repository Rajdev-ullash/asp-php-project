<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

if(!empty($_POST)){
	$output = "";
	
	$title = mysqli_real_escape_string($connection, $_POST["title"]);
	$short = mysqli_real_escape_string($connection, $_POST["short"]);
	$art = mysqli_real_escape_string($connection, $_POST["art"]);



	/* ----------- IMAGE UPLOAD ------------------*/
	if($_FILES["img"]["name"]!=""){
		$dirpath="images/";
		if (!file_exists($dirpath)) {
		    mkdir($dirpath, 0777, true);
		}
		$output ="";
		$target_dir = "images/";

		// rename file


		$fn=rand(10,100000);


		$thisfile = basename($_FILES["img"]["name"]);
		$p = strpos($thisfile,".");
		$ext = substr($thisfile,$p);

		$myfile = $fn.$ext;


		// rename ends
		//$thisfile = basename($_FILES["img"]["name"]);
		$target_file = $target_dir . $myfile;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["img"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $output = "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $output = "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["img"]["size"] > 2500000) {
		    $output = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & Gfdddd fIF files are allowed.";
		    $uploadOk = 0;
		}*/
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		     $output = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
		         $output = "Data saved";
		    } else {
		         $output = "Error";
		    }
		}

		$imagefile = $target_file;
	}else{
		$imagefile = 'null';
	}
	/* -----------end IMAGE UPLOAD ------------------*/

	$query = "INSERT INTO article (img, title,short_des, details) VALUES ('$imagefile','$title','$short','$art')";

	if(mysqli_query($connection, $query)){
		
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			//echo $output;
	}

?>
