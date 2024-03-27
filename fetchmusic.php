<?php 

 require  'includes/func.php';
  require  'includes/config.php';
  $sekk = $music->getData();

  if (isset($_GET['value'])) {
  	$music_id = $_GET['value'];
          ?>
    <script>
          $('#loadin-anim').fadeIn();
    </script>
    <?php
  	  foreach ($music->getData() as $item) {
  	  	if ($item['musicid'] == $music_id) {
                   ?>
    <script>
        $('#loadin-anim').fadeOut();
    </script>
        <?php	  
  	  	?>
  	  	<style>
  	  		.progress-bar-container{
  	  			width: 100%;
  	  			height: auto;
  	  			padding: 1rem 0;
  	  		}
  	  		.audio-container{
  	  			width: 100%;
  	  			margin-left: 29px;
  	  		}
  	  		.dark .progress_div{
  	  			background:  #B5B5B5;
  	  		}
  	  		.progress_div{
  	  			transition: 0.4s background;
  	  			width: 100%;
  	  			height: 3.3px;
  	  			cursor: pointer;
  	  			-webkit-appearance: none;
  	  			appearance: none;
  	  			position: absolute;
  	  			background: #f5f5f5;
  	  			position: absolute;
                top: 0;
                left: 0;
                right: 0;
  	  		}
          @media(max-width: 574px){.progress_div{left: 18px;}}
  	  		.progress{
  	  			transition: width 0.1s  linear;
  	  			position: relative;
  	  			top: 0;
  	  			left: 0;
  	  			width: 0%;
  	  			height: 100%;
  	  			background-color: #6c63ff;
  	  		}
  	  		.progress:after{
  	  			content: "";
  	  			position: absolute;
  	  			right: -10px;
  	  			z-index: 20;
  	  			top: -7px;
  	  			width: 20px;
  	  			height: 20px;
  	  			border: 2px solid #5f5e5e;
  	  			border-radius: 10px;
  	  			background: cornflowerblue;
  	  			box-shadow: 
  	  			0 0 0 4px #e2e8ee,
  	  			0 0 2px #fff,
  	  			4px 4px 9px #a7aaaf,
  	  			-4px -4px 9px #ffffff;
  	  		}
  	  		.progress_div:hover{
  	  			transition: 0.3s height;
  	  			height: 4.8px;
  	  		}
          .dark .progress:after{
            box-shadow: 0 0 0 4px #eaeaea, 0 0 2px #fff, 0px 0px 0px #a7aaaf, 0px 0px 0px #ffffff;
          }
  	  		.progress-duration-meter{
  	  			display: flex;
  	  			justify-content: space-evenly;
  	  			margin-top: 10px;
  	  		}
  	  		.a_ls{
  	  			position: relative; 
  	  			top: -9px;
                height: 30px;
                width: 30px;
                color: #555;
                box-shadow: 0px 1px 0 4px #ffffff, 0 0 2px #fff, 0px 5px 15px #d8d8d8, -8px -8px 15px #ffffff;
                border-radius: 50%;
                line-height: 30px;
                text-align: center;
                cursor: pointer;
                font-size: 30px;
  	  		}
  	  		.dl_div{    
  	  		    position: relative;
  	  		    top: -9px;            
  	  			height: 30px;
                width: 30px;
                color: #555;
                box-shadow: 0px 1px 0 4px #ffffff, 0 0 2px #fff, 0px 5px 15px #d8d8d8, -8px -8px 15px #ffffff;
                border-radius: 50%;
                line-height: 30px;
                text-align: center;
                cursor: pointer;
                font-size:25px;
            }
  	  		.dark .a_ls{
            background: #333333;
            box-shadow: 0px 1px 0 4px #333333, 0 0 2px #fff, 0px 0px 0px #d8d8d8, 0px 0px 0px #333333;
            display: flex;
            justify-content: center;
            align-items: center;
  	  		}
	  		.dark .dl_div{
            background: #333333;
            box-shadow: 0px 1px 0 4px #333333, 0 0 2px #fff, 0px 0px 0px #d8d8d8, 0px 0px 0px #333333;
            display: flex;
            justify-content: center;
            align-items: center;
  	  		}

  	  	</style>
      <div class="progress_div noselect" id="progress_div">
        <div class="progress noselect" id="progress"></div>
      </div>
		<div class="music-box" id="musicbox">
			<div id="load">
			<div class="content-music" >
            <div class="_title_image">
				<div class="image-container">
					<img src="<?php echo $item['musicicon'] ?>" id="img">
          </div>
					<div class="text-container" style="white-space: nowrap;text-overflow: ellipsis; font-family: 'pop-b';">
					 <h3 title="<?php echo $item['musictitle'] ?>" ><?php echo $item['musictitle'] ?></h3>
					  <h3 title="<?php echo $item['musicartist'] ??'UNKNOWN';?>" style=" word-break: break-all; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $item['musicartist'] ??'UNKNOWN';?></h3>
				   </div>
				</div>
				<div class="audio-container">
					<div class="progress-bar-container" id="progress-bar-container">
						<div class="progress-duration-meter">
							<div class="a_ls noselect" id="play" >
								<span class="ta_r1get bx bx-play noselect"></span>
							</div>
							<a class="noselect" href="<?php echo $item['musicfile'] ?>" download="<?php echo $item['musicfile'] ?>" style="text-decoration:none;"> 
							  <div class="dl_div noselect">
								  <span class=" noselect  bx bx-download" ></span>
							  </div>
							</a>
						</div>
					</div>
					<audio preload="true" autoplay="on" id="music"  src="<?php echo $item['musicfile'] ?>"></audio> 
					<script>

            document.querySelector('body').classList.add('navigator');
						var play = document.getElementById('play'),
					      classtargettoplay = document.querySelector('.ta_r1get'),
					      audiotoplay = document.getElementById('music'),
					      pause = document.getElementById('pause'),
					      range = document.getElementById('range'),
					      progress = document.getElementById('progress'),
					      progress_div = document.getElementById('progress_div'),
					      current_time = document.getElementById('current-time'),
					      total_duration = document.getElementById('duration'),
                          isMusicPlaying = true;
					      
					      //fires when audio need to buffer. will work later on this code
					      /*audiotoplay.onwaiting = function(){
					        if(audiotoplay.onwaiting == true){
					           $('#loadin-anim').fadeIn();
					           alert(true)
					          }else{
					           alert(false)
					          }
					      } 
					     */
            if (audiotoplay.autoplay == true) {
              classtargettoplay.classList.remove('bx-play');
              classtargettoplay.classList.add('bx-pause');
            }else{
              classtargettoplay.classList.remove('bx-pause');
              classtargettoplay.classList.add('bx-play');
            }

						//function for play the  music
						playMusic = () => {
							isMusicPlaying = true;
							audiotoplay.play();
							classtargettoplay.classList.remove('bx-play');
							classtargettoplay.classList.add('bx-pause');
						}
						//function for pause the music
                      pauseMusic = () => {
							isMusicPlaying = false;
							audiotoplay.pause();
							classtargettoplay.classList.remove('bx-pause');
							classtargettoplay.classList.add('bx-play');
						}
						play.addEventListener("click", () => {
							isMusicPlaying ? pauseMusic() : playMusic();
						});
              // default volume 
							audiotoplay.volume =  1; 

            	audiotoplay.addEventListener('timeupdate', (event) => {

							  var {currentTime, duration} = event.srcElement;
							  var progress_time = (currentTime / duration) * 100;
							  progress.style.width = `${progress_time}%`;

							  // music duration update
							  var min_duration = Math.floor(duration / 60);
							  var sec_duration = Math.floor(duration % 60);

							  var tot_duration = `${min_duration}:${sec_duration}`;

						     // current music duration update
							  var min_currentTime = Math.floor(currentTime / 60);
							  var sec_currentTime = Math.floor(currentTime % 60);

							  if (sec_currentTime < 10) {
								    sec_currentTime = `0${sec_currentTime}`;
							  }
							  var tot_currentTime = `${min_currentTime}:${sec_currentTime}`;
							
						   
						});
						progress_div.addEventListener('click', setProgress);
              function setProgress(e) {
                var width = this.clientWidth,
                clickX = e.offsetX,
                duration = audiotoplay.duration;
                audiotoplay.currentTime = (clickX / width) * duration;
              }
			audiotoplay.onended = () => {pauseMusic();}
            window.addEventListener('keydown', () => {musicPOP(event)})
            musicPOP = (event) => {
                if(event.keyCode == 32){
                 if(isMusicPlaying === true){
                    pauseMusic();
                  }else{
                    playMusic();
                 }
                }
            }
					</script>
				</div>
				<div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 </div>
			</div>
		 </div>
		</div>
  	  	<?php
  	  }
  	}
  }else{
    ?>
    <script>
        $('#loadin-anim').fadeOut();
        
    </script>
        <?php
  }
?>