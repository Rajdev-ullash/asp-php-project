<?php
require_once('admin/databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	
	$name = mysqli_real_escape_string($connection, $_POST["name"]);
	$age = mysqli_real_escape_string($connection, $_POST["age"]);
	$email = mysqli_real_escape_string($connection, $_POST["email"]);
	$phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $doc = mysqli_real_escape_string($connection, $_POST["doc"]);
    $adate = mysqli_real_escape_string($connection, $_POST["apdate"]);
    $atime = mysqli_real_escape_string($connection, $_POST["aptime"]);


	$query = "INSERT INTO appointment(pname,age,email,phone,doctor,adate,atime,status) VALUES ('$name','$age','$email','$phone','$doc','$adate','$atime','pending')";

	if(mysqli_query($connection, $query)){
		
			header('Location: success.php');
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			//echo $output;
	}

?>
