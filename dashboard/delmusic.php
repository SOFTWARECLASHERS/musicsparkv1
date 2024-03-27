<?php 
  require  '../includes/config.php';
  error_reporting(0);
  $musicid = $_GET['di'];
  $query = mysqli_query($con, "DELETE FROM musictable WHERE musicid ='$musicid'");

  if ($query) {
  	header("location:index");
  	echo "Record deleted from database";
  }else{
  	echo "failed to delete record from database";
  }