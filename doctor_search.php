<?php
require_once('admin/databases.php');

  $searchstring = $_GET['s'];
  $dept = $_GET['d'];
  $output = "";


  $query = "SELECT * FROM doctor WHERE name LIKE '%$searchstring%' OR dept='$dept' AND status<>'Inactive' ORDER BY dept ASC";

  if($result = mysqli_query($connection, $query)){
	while($row = mysqli_fetch_array($result)) {
	$output .='<div class="col-xl-3 col-lg-3 col-md-6  wow fadeInUp" data-wow-delay="100ms">';
  $output .='<div class="team-one__single">';
  $output .='<div class="team-one__img">';
  $output .='<div class="team-one__img-box">';
  $output .='<img src="admin/'.$row['image'].'" alt="">';
  $output .='</div></div>';
  $output .='<div class="team-one__content">';
  $output .='<h3 class="team-one__name"><a href="team-details.html">'.$row['name'].'</a></h3>';
  $output .='<p class="team-one__sub-title">'.$row['details'].'</p>';
  $output .='</div></div></div>';
  }
	  echo $output;
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }
?>
