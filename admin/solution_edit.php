<?php
 include_once('databases.php');

  $id = mysqli_real_escape_string($connection, $_GET['id']);
  $caption = mysqli_real_escape_string($connection, $_GET['caption']);
 

  $query = "UPDATE solutions SET caption='$caption' WHERE id='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    echo "Record Updated Successfully";
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>