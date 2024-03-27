<?php 
   require  '../includes/config.php';
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

   if($_FILES['file-img']['name']){
      move_uploaded_file($_FILES['file-img']['tmp_name'], "image/".$_FILES['file-img']['name']);
      $img="image/".$_FILES['file-img']['name'];
    }
  $password_hash = password_hash($password, PASSWORD_BCRYPT);
   $query = "INSERT INTO dsusers(dsusername, dsuserpassword, dsusericon) VALUES ('$username','$password_hash','$img')";
    $execute = mysqli_query($con, $query);
    if($execute){
    	?>
    	<script>
    		alert("YOUR RECORD HAS BEEN INSERTED");
    	</script>
    	<?php
      }else{
       echo "failed to upload";
       return false;
      }
      
 ?>