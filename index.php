<?php 

require  'includes/func.php';
?>
<?php 
require  'includes/config.php';
$sqlqluery = "SELECT * FROM statustable";
$result = mysqli_query($con, $sqlqluery) or die( mysqli_error($con));
$row = mysqli_fetch_array( $result,MYSQLI_ASSOC);
if ($row['status'] == 1) {
	
}else{
	header("location:maintenance");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- GTM -->
	<script>(function (w, d, s, l, i) {
			w[l] = w[l] || []; w[l].push({
				'gtm.start':
					new Date().getTime(), event: 'gtm.js'
			}); var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
					'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-WR83PFW');</script>
	<!-- END GTM -->

	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>MUSIC SPARK- MUSIC DOWNLOADER ONLINE PLAY AND DOWNLOAD ONLINE FOR FREE</title>
	<meta name="description"
		content="Music downloader. We provide lot of music here you can listen any song and download for free" />
	<meta name="keywords" content="music spark, musicpark, MUSIC SPARK, music sparks, music, music downloader" />
	<meta name="google-site-verification" content="6Ls-lM3nvddryZNZFQ8Sxu_1rfO2tA_WoC06DdwwadY" />
	<meta name="msvalidate.01" content="29DE9EEDB4A6F33E1DA27B6829B621D5" />

	<meta name="robots" content="index, follow">
	<meta name="language" content="English">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="theme-color" content="#ececec">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="assests/musicspark.png">
	<link rel="canonical" href="https://musicspark.epizy.com/music/">
	<meta name="google-site-verification" content="YtUaswjr9aBdlocbyrt_n1sjOfC1kSfd51Xh2HVLHnA" />
	<link rel="stylesheet" href="css/style.css?v=<?php echo time()?>">
	<script src="js/jquery-3.5.1.min.js?v=<?php echo time(); ?>"></script>
	<base href="/music/">
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WR83PFW" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<noscript>JAVASCRIPT IS DISABLED PLEASE ENABLE THE JAVASCRIPT</noscript>
	<div class="progress-container">
		<div class="progress-bar" id="myBar"></div>
	</div>
	<header id="sh-scroll">
		<div class="img-div">
			<img id="remove" src="assests/musicspark.png" alt="MUSIC SPARK">
		</div>
		<div class="search-container" style="width: 50%;">
			<input type="text" class="search-header" autocomplete="off" id="search-input" name="search" spellcheck="off"
				placeholder="SEARCH">
		</div>
		<button class="btn-header noselect toggle-theme"><i class="bx bxs-sun noselect"></i><span
				class="sp">DARK/LIGHT</span></button>
	</header>
	<?php include 'includes/_loading_animation.php'; ?>
	<div class="sidebar" id="sidebar">
		<ul class="sidebar-nav">

			<?php 
				$qs = "SELECT * FROM musictable  ORDER BY musicid DESC LIMIT 8";
				$query = mysqli_query($con,$qs);
				while ($res = mysqli_fetch_array($query)) {
					?>
			<li class="sidebar-nav-item" onclick="playjx('<?php echo $res['musicid'];?>')">
				<a href="javascript:void(0)" class="sidebar-nav-link">
					<div>
						<!-- <i class="fas fa-tachometer-alt"></i> -->
						<img src="<?php echo $res['musicicon']?>">
					</div>
					<span>
						<?php echo $res['musictitle']?>
					</span>
				</a>
			</li>
			<?php
				}

			?>
		</ul>
		<div class="toggle"><i id="rem-i" class="fas fa-chevron-right"></i></div>

	</div>
	<script>
		document.querySelector('.toggle').onclick = function () {
			collapseSidebar();
			const removeClass = document.querySelector('#rem-i');
			removeClass.classList.toggle('fa-chevron-right');
			removeClass.classList.toggle('fa-chevron-left');
		}
	</script>
	<!-- end sidebar -->
	<div class="main">
		<div id="list-show"> </div>
		<div class="wrapper-tst">
			<div class="toast">
				<div class="content-t">
					<div class="icon"><i class="fas fa-wifi"></i></div>
					<div class="details">
						<span>You're online now</span>
						<p>Hurray! Internet is connected.</p>
					</div>
				</div>
				<div class="close-icon-toast">
					<i class="fas fa-times"></i>
				</div>
			</div>
		</div>
		<div class="landing-page">
			<div id="container">
				<div id="content-container">
					<h1>NoMusic, <br> No Life<span style="font-size: 50px;">;)</span></h1>
					<p>Without Music Life is boring But Don't Worry You Can Listen Any Song From Here In Free No Cash No
						Money. Just Click On Music And Listen It Or Download :)</p>
					       <a href="#sec-music" class="noselect">
						<button class="noselect"   id="buttons">GET STARTED</button>
						    </a>
				</div>
				<div id="bg-container">
					<img src="assests/bg.svg" alt="MUSIC">

				</div>
				<ul class="noselect">
					<li class="noselect"><a href="#" title="facebook"><i class="fab fa-facebook-f"></a></i></li>
					<li class="noselect"><a href="#" title="instagram"><i class="fab fa-instagram"></a></i></li>
					<li class="noselect"><a href="#" title="youtube"><i class="fab fa-youtube"></a></i></li>
				</ul>
			</div>
		</div>
		<div id="main-wr">
			<div class="wrapper" id="sec-music">
				<div class="box">
					<?php 
				    $qs = "SELECT * FROM musictable  ORDER BY musicid DESC LIMIT 4";
					$query = mysqli_query($con,$qs);
					while ($res = mysqli_fetch_array($query)) {
						?>
					<div class="box-content" data-label="<?php echo $res['musictitle']?>"
						onclick="playjx('<?php echo $res['musicid'];?>')">
						<div class="img-icon">
							<img src="<?php echo $res['musicicon']?>" alt="<?php echo $res['musictitle']?>">
						</div>
					</div>

					<?php
					}
				 ?>
				</div>
			</div>
			<div class="wrapper mx-h">
				<div class="box">
					<?php 
			    $qs = "SELECT * FROM musictable order by RAND() LIMIT 20";
				$query = mysqli_query($con,$qs);
				while ($res = mysqli_fetch_array($query)) {
					?>
					<div class="song noselect" title="<?php echo $res['musictitle']?>"
						onclick="playjx('<?php echo $res['musicid'];?>')">
						<div class="paddging">
							<div class="song-image" data-label="<?php echo $res['musictitle']?>">
								<img src="<?php echo $res['musicicon']?>" alt="<?php echo $res['musictitle']?>">
							</div>
						</div>
					</div>
					<?php
				}
			 ?>
				</div>
			</div>
			<div class="wrapper mx-h">
				<div class="box">
					<?php 
			    $qs = "SELECT * FROM musictable order by RAND() LIMIT 20";
				$query = mysqli_query($con,$qs);
				while ($res = mysqli_fetch_array($query)) {
					?>
					<div class="song noselect" title="<?php echo $res['musictitle']?>"
						onclick="playjx('<?php echo $res['musicid'];?>')">
						<div class="paddging">
							<div class="song-image" data-label="<?php echo $res['musictitle']?>">
								<img src="<?php echo $res['musicicon']?>" alt="<?php echo $res['musictitle']?>">
							</div>
						</div>
					</div>
					<?php
				}
			 ?>
				</div>
			</div>
			<div class="wrapper mx-h">
				<div class="box">
					<?php 
			    $qs = "SELECT * FROM musictable order by RAND() LIMIT 20";
				$query = mysqli_query($con,$qs);
				while ($res = mysqli_fetch_array($query)) {
					?>
					<div class="song noselect" title="<?php echo $res['musictitle']?>"
						onclick="playjx('<?php echo $res['musicid'];?>')">
						<div class="paddging">
							<div class="song-image" data-label="<?php echo $res['musictitle']?>">
								<img src="<?php echo $res['musicicon']?>" alt="<?php echo $res['musictitle']?>">
							</div>
						</div>
					</div>
					<?php
				}
			 ?>
				</div>
			</div>
			<div class="wrapper mx-h">
				<div class="box">
					<?php 
			    $qs = "SELECT * FROM musictable order by RAND() LIMIT 20";
				$query = mysqli_query($con,$qs);
				while ($res = mysqli_fetch_array($query)) {
					?>
					<div class="song noselect" title="<?php echo $res['musictitle']?>"
						onclick="playjx('<?php echo $res['musicid'];?>')">
						<div class="paddging">
							<div class="song-image" data-label="<?php echo $res['musictitle']?>">
								<img src="<?php echo $res['musicicon']?>" alt="<?php echo $res['musictitle']?>">
							</div>
						</div>
					</div>
					<?php
				}
			 ?>
				</div>
			</div>
			<div class="wrapper">
				<div class="box">
					<?php 
			    $qs = "SELECT * FROM musictable order by RAND() LIMIT 4";
				$query = mysqli_query($con,$qs);
				while ($res = mysqli_fetch_array($query)) {
					?>
					<div class="box-content" data-label="<?php echo $res['musictitle']?>"
						onclick="playjx('<?php echo $res['musicid'];?>')">
						<div class="img-icon">
							<img src="<?php echo $res['musicicon']?>" alt="<?php echo $res['musictitle']?>">
						</div>
					</div>
					<?php
				 }
				?>
				</div>
			</div>
			<div class="wrapper mx-h">
				<div class="box">
					<?php 
			    $qs = "SELECT * FROM musictable order by RAND() LIMIT 20";
				$query = mysqli_query($con,$qs);
				while ($res = mysqli_fetch_array($query)) {
					?>
					<div class="song noselect" title="<?php echo $res['musictitle']?>"
						onclick="playjx('<?php echo $res['musicid'];?>')">
						<div class="paddging">
							<div class="song-image" data-label="<?php echo $res['musictitle']?>">
								<img src="<?php echo $res['musicicon']?>" alt="<?php echo $res['musictitle']?>">
							</div>
						</div>
					</div>
					<?php
				}
			 ?>
				</div>
			</div>
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="footer-col">
							<h4>CONTACT US</h4>
							<ul>
								<li><a href="mailto:spark@musicspark.com">spark@musicspark.com</a></li>
								<li><a href="tel:+91 8789752300">+91 8789752300</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- music-play-container,navigator -->
			<div class="music-play-container" id="hide-ms"></div>
		</div>
        <script src="js/jquery.primarycolor.js?v=<?php echo time()?>"></script>
		<script src="js/script.js?v=<?php echo time()?>"></script>
</body>

</html>