<?php 
    require  'includes/config.php';
    if (isset($_GET["search"])) {
    	$output = '';
    	$query = "SELECT * FROM musictable WHERE musictitle LIKE '%".$_GET["search"]."%'";
    	$result = mysqli_query($con,$query);
 	    $result = mysqli_query($con,$query);
   	    $output = '<ul class="list">';
   	    if (mysqli_num_rows($result) > 0) {
   	   	   while ($row = mysqli_fetch_array($result)) {
   	   	   	   $output = '
                       <div style="display:flex;">
                        <img src='.$row["musicicon"].' >
                        <div>
                         <h3 id="h3">'.$row["musictitle"].'</h3>
                          <h4>'.$row["musicartist"].'</h4>
                        </div>
                        </div>
                    ';
   	   	   }
   	   }
   	   $output .= '</ul>';
   	   echo $output;
    }
 ?>