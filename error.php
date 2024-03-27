<?php
 $error = $_SERVER['REDIRECT_STATUS'];

 $error_title = '';
 $error_message = '';

 if ($error == 404) {
 	$error_title = 'Opps! Page Not Found';
 	$error_message = "The Page you were looking for doesn't exist. You may have mistyped the addres or the page may have moved.";
 }else{
 	$error_title = 'Opps! Some error occured';
 	$error_message = "Opps! Some error occured On Server";
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="/music/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>404 PAGE NOT FOUND </title>
	<style>
	@font-face{
        src: url(./assests/fonts/Poppins-Bold.ttf);
        font-family: popins;
    }
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			  font-family: popins;
			background: url('p404.png'), #151729;
			color: #fff;
		}
		#container{
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		#container .content{
			text-align: center;
		}
		#container .content h2{
			font-size: 18vw;
			line-height: 1em;
		}
		#container .content h4{
			position: relative;
			font-size: 1.5em;
			margin-bottom: 20px;
			color: #111;
			background: #fff;
			font-weight: 300;
			padding: 10px 20px;
			display: inline-block;
			border-radius: 5px;
		}
		#container .content p{
			font-size: 1.2em;
		}
		#container .content a{
			position: relative;
			display: inline-block;
			padding: 10px 25px;
			background: #ff0562;
			color: #fff;
			text-decoration: none;
			margin-top: 25px;
			border-radius: 25px;
			border-bottom: 4px solid #d00d56;
		}
	</style>
</head>
<body id="con">
	<div id="container">
		<div class="content">
			<h2>404</h2>
			<h4><?php echo $error_title; ?></h4>
			<p><?php echo $error_message; ?></p>
			<a href="index">Back To Home</a>
		</div>
	</div>
	<script>
		const container = document.getElementById('con');
		window.onmousemove = (e) => {
			const x = - e.clientX/5,
			    y = - e.clientY/5;
			container.style.backgroundPositionX = x + 'px';
			container.style.backgroundPositionY = y + 'px';
		}
	</script>
</body>
</html>