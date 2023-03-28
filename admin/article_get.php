<?php
 include_once('databases.php');

  $id = mysqli_real_escape_string($connection, $_GET['id']);
  
 

  $query = "SELECT * FROM article WHERE id='$id'";

  if ( $result = mysqli_query($connection, $query)) {
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>