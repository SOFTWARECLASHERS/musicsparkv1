<?php
   error_reporting(0);
   require  'includes/config.php';
   if (isset($_POST["query"])) {
       $srch_query = trim($_POST["query"]);
   	  $query = "SELECT * FROM musictable WHERE musictitle LIKE '%$srch_query%' UNION SELECT * FROM musictable WHERE musicartist LIKE '%$srch_query%'  ORDER BY musicid DESC";
   	   $result = mysqli_query($con,$query);  
   	   if (mysqli_num_rows($result) > 0) {
   	   	   while ($row = mysqli_fetch_array($result)) {
   	  ?>
         <li onclick="playjx('<?php echo $row['musicid'];?>')" class="noselect">
                     <div  class="d_V-s">
                       <div style="display: flex;margin-bottom: 11px;">
                        <img src="<?php echo $row["musicicon"];?>">
                        <div class="mb-sm">
                         <h3 id="h3" title="<?php echo $row["musictitle"];?>"><?php echo $row["musictitle"];?></h3>
                          <h4 title="<?php echo $row["musicartist"];?>"><?php echo $row["musicartist"];?></h4>
                        </div>
                        </div>
                        </div>
                     </li>
                   <?php
   	   	   }
   	   }else{
            echo '<h4>NO MUSIC FOUND FOR YOUR SEARCH = <span 
               style="color: #6c63ff;
                   text-transform: uppercase;
                   font-family: var(--pop-b);
                   font-size: 20px;">
                   '.$_POST['query'].'
                   </span>
                   YOU CAN 
                   <a href="https://www.google.com/search?q='.$_POST['query'].'" style="text-decoration: none; color:#6c63ff; text-transform: uppercase;
                   font-family: var(--pop-b);
                   font-size: 20px;" target="_blank" rel="rel="noopener noreferrer">"GOOGLE '.$_POST['query'].'" </a>
                  </h4> ';
         }
   }
?>