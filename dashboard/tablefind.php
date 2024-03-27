<?php
//fetch.php
require '../includes/config.php';

$output = '';
if(isset($_POST["name"]))
{
 $search = mysqli_real_escape_string($con, $_POST["name"]);
 $query = "
   SELECT * FROM musictable WHERE musictitle LIKE '%$search%' UNION SELECT * FROM musictable WHERE musicartist LIKE '%$search%' UNION SELECT * FROM musictable WHERE musicid LIKE '%$search%' 
 ";
}
else
{
  echo "no data found";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
 $timestamp = $row['musicuploadedtime'];

  $output .= '
   <tr>
    <td>'.$row["musicid"].'</td>
    <td>'.$row["musictitle"].'</td>
    <td>'.$row["musicartist"].'</td>
    <td>'.$date = date("D M Y",strtotime($timestamp)).'</td>
    <td><a href='.printf('%s?di=%s','delmusic',$row['musicid']).'><button class="btn btn-danger" onclick="if (confirm("ARE YOU SURE?")) {return true;}else{return false;}">DELETE</button></a>
    </td>
    <td><a target="_blank" href="update?id='.$row['musicid'].'"><button class="btn btn-warning" >EDIT</button></a>
    </td>
   </tr>
  ';
 }
 echo $output;
}
else
{
  $output .= '<h2>NO DATA FOUND FOR YOUR SEARCH MAKE SURE YOU HAVE TYPED CORRECTLY</h2>';
  echo $output;
}

?>