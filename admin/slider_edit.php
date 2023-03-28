<?php
 include_once('databases.php');

  $id = mysqli_real_escape_string($connection, $_GET['id']);
  $caption = mysqli_real_escape_string($connection, $_GET['caption']);
  $status = mysqli_real_escape_string($connection, $_GET['status']);


  $query = "UPDATE slider SET caption='$caption',status='$status' WHERE id='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>