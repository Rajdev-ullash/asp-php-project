<?php
 include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
  if(!empty($_POST)){
	$output = "";
	$id = mysqli_real_escape_string($connection, $_POST["id"]);
	$thistitle='title'.$id;
	$thisdetails='art'.$id;
	$thisdetails2='art2';
	$thisimg='img'.$id;
	$title = mysqli_real_escape_string($connection, $_POST[$thistitle]);
	
	$art = mysqli_real_escape_string($connection, $_POST[$thisdetails]);
	$art2 = mysqli_real_escape_string($connection, $_POST[$thisdetails2]);


	/* ----------- IMAGE UPLOAD ------------------*/
	if($_FILES[$thisimg]["name"]!=""){
		$dirpath="images/";
		if (!file_exists($dirpath)) {
		    mkdir($dirpath, 0777, true);
		}
		$output ="";
		$target_dir = "images/";

		// rename file


		$fn=rand(10,100000);


		$thisfile = basename($_FILES[$thisimg]["name"]);
		$p = strpos($thisfile,".");
		$ext = substr($thisfile,$p);

		$myfile = $fn.$ext;


		// rename ends
		//$thisfile = basename($_FILES[$thisimg]["name"]);
		$target_file = $target_dir . $myfile;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES[$thisimg]["tmp_name"]);
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
		if ($_FILES[$thisimg]["size"] > 2500000) {
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
		    if (move_uploaded_file($_FILES[$thisimg]["tmp_name"], $target_file)) {
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
	if ($imagefile != 'null') {
		$query = "UPDATE news SET title='$title',details='$art',summery='$art2',img='$imagefile' WHERE id='$id'";
	} else {
		$query = "UPDATE news SET title='$title',details='$art',summery='$art2' WHERE id='$id'";
	}
	

	if(mysqli_query($connection, $query)){
		
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			//echo $output;
	}

?>