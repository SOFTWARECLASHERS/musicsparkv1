<?php
  require '../includes/config.php';
    // encoded language
      mysqli_set_charset($con,'utf8');
      $musicname = mysqli_real_escape_string($con, $_POST['musicname']);
      $musicartits = mysqli_real_escape_string($con, $_POST['artistname']);

      if($_FILES['musicicon']['name']){
      move_uploaded_file($_FILES['musicicon']['tmp_name'], "../musicicons/".$_FILES['musicicon']['name']);
      $music="musicicons/".$_FILES['musicicon']['name'];
      }

      if($_FILES['musicfile']['name']){
        move_uploaded_file($_FILES['musicfile']['tmp_name'], "../musicfile/".$_FILES['musicfile']['name']);
      $musicfile ="musicfile/".$_FILES['musicfile']['name'];
      }

      $i="insert into musictable(musictitle, musicartist, musicicon, musicfile,   musicuploadedtime)values('$musicname','$musicartits','$music','$musicfile', NOW())";

      $set  = mysqli_query($con, $i);
      if($set){
         $successfullyIn = " SUCCESSFULLY INSERTED!";
      }else{
         echo "FAILED" . mysqli_error($con);
      }
  ?>