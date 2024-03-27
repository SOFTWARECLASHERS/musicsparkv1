	<?php  require 'func.php'; ?>
	<div class="music-play-container">
		<div class="music-box">
			<?php 
			    $music_id = $_GET['musicid'];
                foreach ($music->getData() as $item) :
                if($item['musicid'] == $music_id) : 
			 ?>
			<div class="content-music">
				<div class="image-container">
					<img src="..\<?php echo $item['musicicon'] ?>">
				</div>
				<div class="text-container">
					<h3><?php echo $item['musictitle'] ?></h3>
					<h3>Diller Khariya</h3>
				</div>
			</div>
			<?php 
       endif;
    endforeach;
		 ?>
		</div>
	</div>