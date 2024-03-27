

          <?php

  require '../includes/config.php';



        $qs = "SELECT * FROM musictable ORDER BY musicid DESC";

              $quer = mysqli_query($con,$qs);

              while ($res = mysqli_fetch_array($quer)) {

              ?>

    <tr>

      <th><?php echo $res['musicid'];?></th>

      <td><?php echo $res['musictitle'];?></td>

      <td><?php echo $res['musicartist'];?></td>

      <td><?php $timestamp = $res['musicuploadedtime']; $date = date("D M Y",strtotime($timestamp)); echo $date;?></td>

        <td>

          <a href="<?php printf('%s?di=%s','delmusic',$res['musicid']); ?>"><button class="btn btn-danger" onclick='if (confirm("ARE YOU SURE?")) {return true;}else{return false;}'>DELETE</button></a>

       </td>

       <td>

        <a target="_blank" href="update?id=<?php echo $res['musicid']; ?>"><button class="btn btn-warning" >EDIT</button></a>

       </td>

    </tr>

    <?php

}

    ?>

