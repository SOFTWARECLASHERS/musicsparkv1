<!-- dsindex.php -->
<!-- DEVELOPER CONSOLE -->

<?php 
	// MAKE CONNECTION
	require '../includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // encoded language
      mysqli_set_charset($con,'utf8');
      $musicname = $_POST['musicname'];
      $musicartits = $_POST['artistname'];

      if($_FILES['musicicon']['name']){
      move_uploaded_file($_FILES['musicicon']['tmp_name'], "../musicicons/".$_FILES['musicicon']['name']);
      $music="musicicons/".$_FILES['musicicon']['name'];
      }

      if($_FILES['musicfile']['name']){
        move_uploaded_file($_FILES['musicfile']['tmp_name'], "../musicfile/".$_FILES['musicfile']['name']);
      $musicfile ="musicfile/".$_FILES['musicfile']['name'];
      }

      $i="insert into musictable(musictitle, musicartist, musicicon, musicfile, 	musicuploadedtime)values('$musicname','$musicartits','$music','$musicfile', NOW())";

      $set  = mysqli_query($con, $i);
      if($set){
         $successfullyIn = "YOUR RECORD IS SUCCESSFULLY INSERTED!";
      }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FREEAPPSTORE - DEVELOPERS</title>
	<nav>
		<div class="nav">
			<div class="nav-logo">
				<h4>
					MUSIC SPARK - DEVELOPER'S
				</h4>
			</div>
		</div>
		<div  class="profile-admin" >
				profile
		</div>
	</nav>
			<script src="http://localhost/sep/jquery-3.5.1.min.js?v=<?php echo time(); ?>"></script>
	<style>
		:root{
			--dune: #242221;
			--athens-grey: #e9e8ec;
			--alabmaster: #f8f8f8;
			--true-v: #9174d8;
		}
		@font-face{
          src: url(./fonts-dash/ProductSansBold.ttf);
          font-family: product-sans;
      }
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: product-sans;
		}
		body{
			background-color: var(--athens-grey);
			color: var(--dune);
		}
		nav{
			transition: 0.4s;transition-property: box-shadow;z-index: 9999999; display: flex;justify-content: space-between; padding: 10px;position: sticky;top: 0;background:var(--alabmaster);width:100%;height: 50px;/*box-shadow: 3px 3px 5px #e4e4e4c4;*/ font-size: 25px;}
			.main{
				padding: 20px;
			}
		input{
			padding: 20px;
			outline: none;
			border-radius: 6px;
			font-size: 15px;
			margin-bottom: 10px;
			border: none;
			box-shadow: 0 0 12px #e4e4e4;
            background: #ffffff;
		}
		input:focus{
			-webkit-transform: translateX(20px);
			   -moz-transform: translateX(20px);
			    -ms-transform: translateX(20px);
			     -o-transform: translateX(20px);
			        transform: translateX(20px);
		}
		input::placeholder{
			font-size: 20px;
		    text-transform: uppercase;
		}
		#form-dev{
			display: inline-grid;
		}
		.label{
			margin: 10px;
			font-family: monospace;
			font-size: 30px;
		}
		.submit-btn{
			cursor: pointer;
			padding: 20px;
			outline: none;
			border-radius: 20px;
			width: inherit;
			font-size: 15px;
			margin-bottom: 10px;
			border: none;
			box-shadow: 0 0 12px #e4e4e4;
            background: #f6f6f6;
            margin-top: 20px;
		}
		.submit-btn:hover{
				-webkit-transform: translateX(20px);
			   -moz-transform: translateX(20px);
			    -ms-transform: translateX(20px);
			     -o-transform: translateX(20px);
			        transform: translateX(20px);
		}
		.content-table{
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 1.2em;
			width: 900%;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}
		.content-table thead tr{
			background-color: #009879;
			color: #fff;
			font-family: product-sans;
			text-align: left;
			font-weight: bold;
		}
		.content-table th,
		.content-table td {
			padding: 12px 15px;
		}
		.content-table tbody tr{
			font-family: product-sans;
			border-bottom: 1px solid #dddddd;
		}
		.content-table tbody tr:nth-of-type(even){
			background-color: #f3f3f3;
			font-weight: bold;
			color: #009879;
		}
		.content-table tbody tr:last-of-type{
			border-bottom: 4px solid #009879;
		}
		.center{
			display: flex;
			width: 100%;
			justify-content: center;
		}
		button{
			padding: 10px;
			width: 100px;
			background: transparent;
			cursor: pointer;
			border-radius: 5px;
			overflow: hidden;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			margin-bottom: 10px;
			border: none;
			transition: 0.3s all;
		}
		button:hover{
			transform: translateY(4px);
		}
		.drop-zone-first{
			max-width: 300px;
			height: 200px;
			padding: 25px;
			margin-bottom: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			text-align: center;
			font-weight: 500;
			font-size: 20px;
			cursor: pointer;
			color: #cccccc;
			border: 4px dashed #009578;
			border-radius: 10px;
		}
		.drop-zone--over{
			border-style: solid;
		}
		.drop-zone__thumb{
			width: 100%;
			height: 100%;
			border-radius: 10px;
			overflow: hidden;
			background-color: #cccccc;
			background-size: cover;
			position: relative;
		}
		.drop-zone__thumb::after{
			content: attr(data-label);
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			padding: 5px 0;
			color: #ffffff;
			background: rgba(0,0,0,0.75);
			font-size: 14px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="main">
		<div class="sidenav">
			<ul class="nav-list" role="menubar" >
				
			</ul>
		</div>
	<div class="form-content">
<!-- 	  	name="musicicon" form="form-dev"
name="musicfile" form="form-dev" -->
            <div class="drop-zone-first">
            	<span class="drop-zone__prompt">Drop File Here Or Click Here To Upload</span>
            	<!-- <div class="drop-zone__thumb" data-label='myfile.txt' ></div> -->
          	     <input type="file" name="musicicon" form="form-dev" id="drop-zone-input" style="display: none;" >
            </div>
<!-- 	       <input type="file" name="musicicon" form="form-dev" style="margin-right:100px;">
	       <input type="file" name="musicfile" form="form-dev"> -->
	<form action="dsindex" id="form-dev" method="post" enctype="multipart/form-data" style="display: grid;">
		<input type="text" autocomplete="off" placeholder="music NAME" name="musicname" style="margin-top: 5px;">
		<input type="text" autocomplete="off" placeholder="artist name" name="artistname" style="margin-top: 5px;">
		<button type="submit" class="submit-btn">SUBMIT APP</button>
	</form>
	</div>
	<div class="center">
	<table class="content-table">
		<thead>
			<tr>
				<th>MUSICID</th>
				<th>MUSICNAME</th>
				<th>MSUICARTIST</th>
				<th>MUSICSLUG</th>
				<th>UPLOADTIME</th>
				<th>DELETE</th>
				<th>EDIT	
			<?php 
              $qs = "SELECT * FROM musictable";
              $quer = mysqli_query($con,$qs);
              $row = mysqli_num_rows($quer);
              echo "<span style='margin-left:12px;' >($row)</span>";
			 ?>		
			 </th>
			</tr>
		</thead>
		<tbody>
			<?php
			  $qs = "SELECT * FROM musictable";
              $quer = mysqli_query($con,$qs);
              while ($res = mysqli_fetch_array($quer)) {
              ?>
			<tr>
				<td><?php echo $res['musicid'];?></td>
				<td><?php echo $res['musictitle'];?></td>
				<td><?php echo $res['musicartist'];?></td>
				<td><?php echo $res['musicslug'];?></td>

				<td><?php echo $res['musicuploadedtime'];?></td>
				<td>
					<a href="<?php printf('%s?di=%s','delmusic',$res['musicid']); ?>"><button onclick='if (confirm("ARE YOU SURE TO DELETE?")) {return true;}else{return false;}'>DELETE</button></a>
			 </td>
			 <td>
			 	<a href="update?musicid=<?php echo $res['musicid'];?>& msuicname=<?php echo $res['musictitle'];?>& musicartist=<?php echo $res['musicartist'];?>"><button>EDIT</button></a>
			 </td>
			</tr>
			     <?php
                    }
                ?>
		</tbody>
	</table>
	</div>
	</div>

	<script>
		document.querySelectorAll("#drop-zone-input").forEach(inputElement => {
			const dropZoneElement = inputElement.closest(".drop-zone-first");

			dropZoneElement.addEventListener("click", () => {
				inputElement.click();
			});

            inputElement.addEventListener("change", () => {
            	if (inputElement.files.length) {
            		updateThumbnail(dropZoneElement, inputElement.files[0]);
            	}
            })

			dropZoneElement.addEventListener('dragover', e => {
				e.preventDefault();
				dropZoneElement.classList.add('drop-zone--over');
			});

			["dragleave", "dragend"].forEach(type => {
			  dropZoneElement.addEventListener(type, e =>{
				dropZoneElement.classList.remove("drop-zone--over");
			  });
			});

			dropZoneElement.addEventListener("drop", e => {
				e.preventDefault();
				console.log(e.dataTransfer.files);

				if (e.dataTransfer.files.length) {
					inputElement.files = e.dataTransfer.files;
					console.log(inputElement.files);
					// update thumb
					updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
				}

				dropZoneElement.classList.remove("drop-zone--over");
			});
		});
         // @param {HTMLElement} dropZoneElement
         // @param {File} file
		function updateThumbnail(dropZoneElement, file){
			console.log(dropZoneElement);
			console.log(file);
			let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

			if (dropZoneElement.querySelector(".drop-zone__prompt")) {
				dropZoneElement.querySelector(".drop-zone__prompt").remove();
			}

			// first time - there is no thumbnail element, so let's create it

			if (!thumbnailElement) {
				thumbnailElement = document.createElement("div");
				thumbnailElement.classList.add("drop-zone__thumb");
				dropZoneElement.appendChild(thumbnailElement);
			}

			thumbnailElement.dataset.label = file.name;

			// show thumbnail for image file
			if (file.type.startsWith("image/")) {
				const reader = new FileReader();

				reader.readAsDataURL(file);
				reader.onload = () => {
					thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
				};
			}else{
				alert("UNEXPECTED FILE");
				thumbnailElement.style.background = '#cccccc';
			}
		}

	function deleteuser(userID){
   		if (confirm("ARE YOU SURE TO DELETE MUSIC FROM DATABASE?")) {
   			$.ajax({
   				type: 'get',
   				url:'delmusic',
   				data:{deleteuserid:userID},
   				beforeSend: () => {
   					
   			     },
   				error: () => {alert('FALIED TO DELETE USER !');
   				      
   			    },
   				success: (data) => {
   					// $('#loadin-anim').hide();
   					// $('#deleteusers' + userID).hide();
   					console.wamsuicname('USER DELETED SUCCESSFULLY');
   					alert("DELETED SUCCESSFULLY!");
   				}
   			});
   		};
   	};

	</script>
</body>
</html>