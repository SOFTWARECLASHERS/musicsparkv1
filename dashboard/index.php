<?php
  require '../includes/config.php';
  include '../includes/_loading_animation.php';
$sql_query = "select * from dsusers where id = '$_SESSION[id]'";
if(!isset($_SESSION['id'])){
  header ('location:dashboard_login/login');
}
$query = mysqli_query($con, $sql_query);
$arr = mysqli_fetch_assoc($query);

if (isset($_POST['submit-btn-model'])) {
  require 'fetch.php';
}
if (isset($_GET['type'])) {
  if (isset($_GET['status']) && $_GET['status']=='activate') {
     
     $query = mysqli_query($con,"UPDATE statustable SET status='1' WHERE 1");
     if ($query) {
       ?>
       <script>
         alert('WEBSITE ACTIVATED');
       </script>
       <?php
     }else{
          ?>
       <script>
         alert('FAILED TO ACTIVATE');
       </script>
       <?php
     }
  }
 }
 if (isset($_GET['type'])) {
     if (isset($_GET['status']) && $_GET['status']=='deactivate') {
        $query = mysqli_query($con,"UPDATE statustable SET status='0' WHERE 1");
     if ($query) {
       ?>
       <script>
         alert('WEBSITE DEACTIVATED');
       </script>
       <?php
     }else{
             ?>
       <script>
         alert('FAILED TO DEACTIVATE');
       </script>
       <?php
     }        
     }
 }
?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="shortcut icon" href="../assests/musicspark.png">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="MUSIC SPARK DASHBOARD" />
    <meta name="keywords" content="musicspark.epizy.com, https://musicspark.epizy.com/, music spark, MUSIC SPARK" />
    <title>CONTROL PANEL - MUSIC SPARK</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  :root{
    /*dark theme */
    --color-dark-text: #B5B5B5;
    --bg-dark-body: #333333;
    --bg-cards-dark: #434343;
  }
  *{
    padding: 0;
    margin:0;
    box-sizing: border-box;
  }
  body{
    font-family: 'Poppins', sans-serif;
    font-weight:400;
    -webkit-transition: all .25s;
    -moz-transition: all .25s;
    -ms-transition: all .25s;
    -o-transition: all .25s;
    transition: all .25s;
    box-sizing: border-box;
  }
  input{
      text-transform: uppercase;
  }
  .main{
    padding: 10px;
  }
    .drop-zone-first{
      max-width: 300px;
      height: 200px;
      padding: 9px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-weight: 500;
      font-size: 20px;
      cursor: pointer;
      color: #cccccc;
      border-radius: 10px;
    }
    .drop-zone--over{
      border: 4px dotted #fff;
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
    li{
      list-style: none;
    }
    .row>*{
      width: 0% !important;
    }
    .row{
      padding-left: 0;
    }
    nav{
      position: sticky!important;;
      top: 0px !important;
      background-color: rgba(255,255,255,.72);
      backdrop-filter: blur(20px);
      border-bottom: 0.7px solid #dfdfdf;
    }

     @media (max-width: 1024px) {

           table{
        width: fit-content !important;
     }

     .btn{
       padding: 5px !important
     }
     }
     span{
      font-size: 20px;
      color: #000;
     }
     .wrapper{
      padding: 20px;
      overflow-x: auto;
      overflow-y: auto;
     }
      /*dark config*/
     .dark th{
       color: var(--color-dark-text);
     }
     .dark td{
       color: var(--color-dark-text);
     }
   .dark nav{
      background:#434343d9;
      backdrop-filter: blur(20px);
      border-bottom: 0.7px solid #dfdfdf0a;
     }
     .dark input{
       background-color: var(--bg-cards-dark);
       color: #fff !important;
       border: 1px solid #ced4da29 !important;
       text-transform: uppercase;
     }
     .dark input:focus{
       background-color: var(--bg-cards-dark);
     }
      .dark input::placeholder{
        color: #fff;
      }
      .dark  .drop-zone-first{
        background-color: var(--bg-cards-dark) !important;
      }
      .dark  .drop-zone-first span{
        color: #d0d0d0b3 !important;
      }
      .dark .navbar-brand{
        color: #fff !important;
      }
      .dark span{
        color: #fff;
      }
      .dark tbody, td, tfoot, th, thead, tr{
        border-style: none;
        border-color: none;
      }
   .ci-main{
    position: fixed;
    width: 100%;
    height: 100vh;
    top: 0;
    left: 0;
    z-index: 9;
    display: flex;
    justify-content: center;
    align-items: center;
      backdrop-filter: blur(2px);
  }
  svg{
    position: fixed;
    width: 150px;
    height: 150px;
    z-index: 9;
    animation: rotate 1s linear infinite;
  }
  svg circle{
    width: 100%;
    height: 100%;
    fill: none;
    stroke-width:10;
    stroke: #00a1ff;
    stroke-linecap: round;
    transform: translate(5px,5px);
    stroke-dasharray: 440;
    stroke-dashoffset: 440;
    animation: animate 2s linear infinite;
  }
  @keyframes rotate{
    0%{
      transform: rotate(0deg);
    }
    100%{
      transform: rotate(360deg);
    }
  }
  @keyframes animate{
    0%,100%{
      stroke-dashoffset: 440;
    }
    50%{
      stroke-dashoffset: 0;
    }
    50.1%{
      stroke-dashoffset: 880;
    }
  }
      .right-d  .fa-hand-point-up, .fa-power-off{
        color: #000;
        cursor: pointer;
        font-size: 30px;
        margin-right: 5px;
      }

     .dark .right-d  .fa-hand-point-up, .dark .fa-power-off{
        color:#fff;
     }
     .span-s{
       font-size: 30px;
     }
</style>
    <nav class="navbar navbar-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img  src="<?php echo $arr['dsusericon']; ?>" alt="<?php echo $arr['dsusername']; ?>" class="d-inline-block align-text-top" style="width: 40px;height: 32px; border-radius: 5px; margin-right: 6px; ">
     <?php echo $arr['dsusername']; ?>
    </a>
       <div class="right-d">
   <a href="?type=status&status=activate"><i class="fas fa-hand-point-up"></i></a>
   <a href="?type=status&status=deactivate"><i class="fas fa-power-off"></i></a>
    <a href="dashboard_login/logout">
   <span title="log out" class="span-s" ><i class="fa fa-sign-out-alt" ></i></span>
   </a>
   </div>
  </div>
</nav>

  </head>
  <body>
      <div class="ci-main">
      <svg>
       <circle cx="70" cy="70" r="70"></circle>
       <img src="image/m_S-removebg-preview.png" style="  width: 116px;
    align-items: center;
    justify-content: center;
    align-self: center;
    position: absolute;
    transform: translate(-1px, 7px);"
     alt="image">
       <div class="status" ></div>
      </svg>
    </div>
    <div class="main">
     <form action="" id="form-dev" method="post" enctype="multipart/form-data" >
          <center>
          <ul class="row g-3" >
            <li id="icon" class="col">
              <div class=" drop-zone-first bg-light ">
                 <span class="drop-zone__prompt" >Drop File Here Or Click Here To Upload Icon</span>
                 <input type="file" name="musicicon" id="drop-zone-input" style="display: none;" r>
           </div>
            </li>
            <li id="file" class=" col">
              <div class="drop-zone-first bg-light col">
                 <span class="drop-zone__prompt " >Drop File Here Or Click Here To Upload Music</span>
                 <input type="file" name="musicfile" id="drop-zone-input" style="display: none;" >
               </div>
            </li>
          </ul>
          </center>
 
        <div class="col mb-3">
          <input type="text" class="form-control"  name="musicname" placeholder="MUSIC NAME" autocomplete="off" required style="padding: 10px;">
</div>


<div class="col">      
     <input type="text" class="form-control" placeholder="MUSIC ARTIST" name="artistname"  autocomplete="off" required style="padding: 10px;">
</div>
</div>
<center>
<div class="col">
  <input type="submit"  class="btn btn-primary mb-3" style="outline: none; cursor: pointer; border:none; width: 50%; padding: 0.8rem !important; border-radius: 10px;" value="UPLOAD" name="submit-btn">
 </div>
 </center>

      </form>
      <div class="wrapper">
      <table class="table table-striped">
   <thead>
    <tr>
      <th>Id</th>
      <th>NAME</th>
      <th>ARTIST</th>
      <th>UPLOADTIME</th>
      <th>DELETE</th>
      <th>EDIT       <?php 
              $qs = "SELECT * FROM musictable";
              $quer = mysqli_query($con,$qs);
              $row = mysqli_num_rows($quer);
              echo "<span style='margin-left:12px;' >($row)</span>";
       ?>   </th>
    </tr>
  </thead>
<tbody>
<input type="text" class="form-control " id="tbl_search" placeholder="SEARCH SONGS" name="search_tbl">
</tbody>
</table>  
</div>  
    </div>
        <script src=".\..\js\jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
          $(document).ready(() => {
            calltable();
            $("#tbl_search").keyup(function () {
               var query = $(this).val();
               if(query !=''){
                 callname(query);          
                }else{
                  calltable();
                }
              })
              function callname(name) {
                $.ajax({
                  type: 'POST',
                  url: 'tablefind',
                  data: {name:name},
                  beforeSend: () => {
                    $('#loadin-anim').fadeIn();
                  },
                  error: () =>{
                    console.error("An error occured!");
                    $('#loadin-anim').fadeOut();
                  },
                  success: (data) => {
                    $("tbody").html(data);
                    $('#loadin-anim').fadeOut();
                  }
                })
              }
           $('svg').fadeOut();
           $('.ci-main').fadeOut();
        $('#form-dev').on('submit', function (e){
          e.preventDefault();
          $.ajax({
           type: 'POST',
           url: 'a_d-jx',
           data: new FormData(this),
           contentType: false,
           processData:false,
           beforeSend: () => {
             $('.ci-main').fadeIn();
            $('svg').fadeIn();
            $('body').css("overflow-x","hidden");
            $('body').css("overflow-y","hidden");
           },  
           error: (err) => {
               alert("SOMETHING WENT WRONG PLEASE TRY AGAIN");
               $('.ci-main').fadeOut();
               $('svg').fadeOut();
               $('body').css("overflow-x","auto");
               $('body').css("overflow-y","auto");
           },
            success: () => {
               $('.ci-main').fadeOut();
              $('svg').fadeOut();
               $('body').css("overflow-x","auto");
               $('body').css("overflow-y","auto");
                location.reload(true);
               $('#form-dev')[0].reset();
            }
          });
        });
        function calltable() {
         $.ajax({
           type: 'POST',
           url: 'table',
           beforeSend: () => {
              $('#loadin-anim').fadeIn();
              $('.ci-main').fadeIn();
              $('svg').fadeIn();
              $('body').css("overflow-x","hidden");
              $('body').css("overflow-y","hidden");
           },  
           error: () => {
             alert('FAILED TO FETCH DATA');
             location.reload(true);
             
           },
           success:(data) => {
              $('#loadin-anim').fadeOut();
              $('.ci-main').fadeOut();
              $('svg').fadeOut();
              $('body').css("overflow-x","auto");
              $('body').css("overflow-y","auto");
              $('tbody').html(data);
            }
          })
        }
      });
       const body = document.getElementsByTagName('body')[0];
   const themeDark = 'dark';
   const enableDarkMode = () => {
      body.classList.add(themeDark);
      body.style.background = "#333333";
    };
   const disableDarkMode = () => {
     body.classList.remove(themeDark);
     body.style.background = "#fff";
   };

   setInterval(() => {
   let darkMode = localStorage.getItem('darkMode');
   if (darkMode == 'enabled') {
    enableDarkMode();
    }else{
    disableDarkMode();
    }
   },1000)
         // DRAG AND DROP FUNCTIONS
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

      // hide thumbnail for image file
      if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
          thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
      }else if(file.type.startsWith("audio/")) {
        thumbnailElement.style.background = 'silver';
      }else{
        thumbnailElement.style.background = '#cccccc';
      }
    }

    </script>
  </body>
</html>