<?php
require  'includes/config.php';
$sqlqluery = "SELECT * FROM statustable";
$result = mysqli_query($con, $sqlqluery) or die( mysqli_error($con));
$row = mysqli_fetch_array( $result,MYSQLI_ASSOC);
if ($row['status'] == 1) {
	header("location:http://musicspark.epizy.com/");
}else{
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="assests/spark_lg.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Website Under Maintenance!</title>
	<style>
		  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
		*{
			margin: 0;
			padding: 0;
			scroll-behavior: smooth;
			box-sizing: border-box;
		}
		body{
			 font-family: 'Poppins', sans-serif;
			padding: 10px;
			box-sizing: border-box;
			display: flex;
			justify-content: center;
			flex-direction: column;
			align-items: center;
		}
		img	{
			width: 38rem;
		}
		@media (max-width: 760px) {
			img{
				width: 20rem;
			}
		}
	</style>
</head>
<body>
	<img src="assests/musicspark.png" style="width: 40px;" alt="LOGO">
	<h1>We'll Be Back Soon</h1>
	<p><center>Music Spark is down for scheduled maintenance and expect <br> to back online in a few minutes.</center></p>
	 <img src="build_s.svg" alt="MAINTENANCE">

</body>
</html>