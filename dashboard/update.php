<?php
  require '../includes/config.php';
  $id=$_GET['id'];
  $qs = "SELECT * FROM musictable WHERE musicid='$id'";
  $quer = mysqli_query($con,$qs);
  $row = mysqli_fetch_assoc($quer);

    if (isset($_POST['submit'])) {

     mysqli_set_charset($con,'utf8');

     $musicid = $_POST['musicid'];
     $msuicname = $_POST['msuicname'];
     $msuicartist = $_POST['musicartist'];
     $new_image = $_FILES['icon']['name'];
     $old_image = $_POST['old_icon'];
     echo $old_image;

    if($new_image != '') {
       $update_filename = "musicicons/".$_FILES['icon']['name'];
    }else{
      $update_filename = $old_image;
    }

    $query = " UPDATE musictable SET musictitle='$msuicname', musicartist='$msuicartist', musicicon='$update_filename' WHERE musicid= ' $musicid'";
    $data = mysqli_query($con,$query);

    if ($data) {
      if ($_FILES['icon']['name'] !='') {
          move_uploaded_file($_FILES["icon"]["tmp_name"], "../musicicons/".$_FILES["icon"]["name"]);
          unlink("../".$old_image);
      }
      echo "UPDATED SUCCESFULLY";
      header('location:index');
    }else{
       ?>
       <script>alert('SOMETHING WENT WRONG')</script>
       <?php
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robot" content="noindex,nofollow">
	<title>UPDATE DATA = <?php echo $row['musictitle']; ?></title>
	<style>
		*{ margin: 0; padding: 0; box-sizing: border-box; } 
		form{
		    width: 100%;
            padding:20px;
            display: flex grid;
            justify-content: center; 
         }
 form input{
    padding:20px; 
    margin-top: 10px; 
    border-radius: 10px;
    border: none;
    background:#fff;
    box-shadow: 1px 4px 12px #f1f1f1;
    outline: none;
    outline:none; 
    width: 100%; 
}
	</style>
     <link rel="icon" href="..\assests\spark_lg.png">
</head>
<body>
	<div class="form">
		<form action="" method="POST" id="frm" enctype="multipart/form-data">
			<center><h2 style="font-family: sans-serif; font-weight: 900;">UPDATE</h2>
      <img src="../<?php echo $row['musicicon'];?>" style="border-radius:10px;margin-top:10px;" width="300" heigth="300"></center>
			<input type="text" name="musicid" value="<?php echo $row['musicid']; ?>" readonly="true">
			<input autocomplete="off" type="text" placeholder="CHANGE MUSIC SONG NAME" name="msuicname" value="<?php echo $row['musictitle']; ?>">
			<input type="text" placeholder="CHANGE MUSIC ARTIST NAME" name="musicartist" value="<?php echo $row['musicartist']; ?>"autocomplete="off">
      <input type="hidden" value="<?php echo $row['musicicon']; ?>" name="old_icon">
       <input type="file" name="icon">
			<input type="submit" value="UPDATE" name="submit" style="cursor: pointer;">
		</form>
	</div>
</body>
</html>
