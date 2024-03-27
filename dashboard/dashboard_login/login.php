<?php
  include '../../includes/config.php';
  if(isset($_SESSION['id'])){
     header ('location:../');
  }
     if(isset($_POST['btnsubmit'])){
        $username = $_POST['name-user'];
        $password = $_POST['password'];
        // and dsuserpassword='$password'
        $s = "select * from dsusers where dsusername='$username' ";
        $query = mysqli_query($con, $s);

        $rows = mysqli_num_rows($query);

        if($rows) {
            $arr = mysqli_fetch_assoc($query);

            $db_pass = $arr['dsuserpassword'];
            $decode = password_verify($password, $db_pass);
            if ($decode) {
              $_SESSION['id'] = $arr['id'];
              header("location:../index");
            }else{
               ?>
              <div class="push-notification show" id="push_div">
                   <span class="fas fa-exclamation-circle"></span>
                   <span id="text">PASSWORD INCORRECT!</span>
                   <div class="close-btn" onclick="remove()">
                     <span class="fas fa-times" ></span>
                   </div>
               </div>
                <script>
                   setTimeout(() => {
                      remove()
                   },5000);
                  function remove() {
                    const pushdiv = document.querySelector('.push-notification');
                    pushdiv.classList.add('hide');
                  }
              </script>
              <?php
            }
        }        
        else{
                        ?>
              <div class="push-notification show" id="push_div">
                   <span class="fas fa-exclamation-circle"></span>
                   <span id="text">USER NAME INCORRECT</span>
                   <div class="close-btn" onclick="remove()">
                     <span class="fas fa-times" ></span>
                   </div>
               </div>
                <script>
                   setTimeout(() => {
                      remove()
                   },5000);
                  function remove() {
                    const pushdiv = document.querySelector('.push-notification');
                    pushdiv.classList.add('hide');
                  }
              </script>
        <?php
        }            
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="shortcut icon" href="../../assests/musicspark.png">
  <title>LOGIN DASHBOARD USER</title>
  <style>
    :root{
      --first-color: #1A73E8;
      --input-color: #80868B;
      --border-color: #DADCE0;

      --normal-font-size: 1rem;
      --small-font-size: .75rem;
    }
    @font-face{
    src: url(ProductSansBold.ttf);font-family:pr;}
    *,::before,::after{
      box-sizing: border-box; 
    }
    body{ 
      margin: 0;
      padding: 0;
      font-family: pr; 
      overflow: hidden;
  }
    .push-notification{
      opacity: 0;
      background: #ffc6c1;
      padding: 20px 40px;
      min-width: 420px;
      position: absolute;
      right: 0;
      top: 10px;
      border-radius: 4px;
      overflow: hidden;
      border-left: 8px solid #f44336;
    }
    .push-notification .fa-exclamation-circle{
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      color: #f44336;
      font-size: 30px;
    }
    .push-notification #text{
      padding: 0 20px;
      font-size: 18px;
      color: #f44336;
    }
    .push-notification.show{
      opacity: 1 !important;
      animation: show_slide 1s ease forwards;
    }
     .push-notification.hide{
       animation: hide_slide 1s ease forwards;
     }
     @keyframes hide_slide {
      0%{
        -webkit-transform: translateX(-10px);
           -moz-transform: translateX(-10px);
            -ms-transform: translateX(-10px);
             -o-transform: translateX(-10px);
                transform: translateX(-10px);
      }
      40%{
        -webkit-transform: translateX(0%);
           -moz-transform: translateX(0%);
            -ms-transform: translateX(0%);
             -o-transform: translateX(0%);
                transform: translateX(0%);
      }
      80%{
        -webkit-transform: translateX(-10%);
           -moz-transform: translateX(-10%);
            -ms-transform: translateX(-10%);
             -o-transform: translateX(-10%);
                transform: translateX(-10%);
      }
      100%{
        -webkit-transform: translateX(100%);
           -moz-transform: translateX(100%);
            -ms-transform: translateX(100%);
             -o-transform: translateX(100%);
                transform: translateX(100%);
      }
    }
    @keyframes show_slide {
      0%{
        -webkit-transform: translateX(100%);
           -moz-transform: translateX(100%);
            -ms-transform: translateX(100%);
             -o-transform: translateX(100%);
                transform: translateX(100%);
      }
      40%{
        -webkit-transform: translateX(-10%);
           -moz-transform: translateX(-10%);
            -ms-transform: translateX(-10%);
             -o-transform: translateX(-10%);
                transform: translateX(-10%);
      }
      80%{
        -webkit-transform: translateX(0%);
           -moz-transform: translateX(0%);
            -ms-transform: translateX(0%);
             -o-transform: translateX(0%);
                transform: translateX(0%);
      }
      100%{
        -webkit-transform: translateX(-10px);
           -moz-transform: translateX(-10px);
            -ms-transform: translateX(-10px);
             -o-transform: translateX(-10px);
                transform: translateX(-10px);
      }
    }
    .push-notification .close-btn{
      position: absolute;
      right: 0px;
      top: 50%;
      transform: translateY(-50%);
      background: #f44336;
      padding: 20px 18px;
    }
    .push-notification .close-btn .fa-times{
      color: #ffcac9;
      font-size: 22px;
      line-height: 40px;
    }
    .push-notification .close-btn:hover {
      cursor: pointer;
      /*background: #ffc766;*/
    }
    .l-form{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      width: 360px;
      padding: 2rem 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(92,99,105,.2);
    }
    form h2{
      font-weight: 500;
      margin-bottom: 2rem;
      font-family: pr;
      font-weight: 600;
    }
    form .form-div{
      position: relative;
      height: 48px;
      margin-bottom: 1.5rem;
    }
    form .form-div input{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      font-size: var(--normal-font-size);
      border: 1px solid var(--border-color);
      border-radius: .5rem;
      outline: none;
      background: none;
      padding-left: 1rem;
      font-family: pr;
      font-weight: 600;
      z-index: 1;
    }
    form .form-div label{
      position: absolute;
      left: 1rem;
      top: 1rem;
      padding: 0 .25rem;
      background-color: #fff;
      color: var(--input-color);
      font-size: var(--small-font-size);
      transition: .3s;
    }
    .btn-f{
      display: block;
      margin-left: auto;
      padding: .75rem 2rem;
      outline: none;
      border: none;
      outline: none;
      background: var(--first-color);
      color: #fff;
      font-size: var(--normal-font-size);
      border-radius: .5rem;
      cursor: pointer;
      transition: 0.3s;
      font-family: pr;
      font-weight: 600;
    }
    .btn-f:hover{
      box-shadow: 0 10px 36px rgba(0,0,0,.15);
    }
   input:focus{
    transition: 0.4s;
    border: 1px solid #fff !important;
    box-shadow: 0 0 20px rgb(0 0 0 / 8%);
    }
  </style>
</head>
<body>
  <div class="l-form">
  <form action="login" method="post">
    <h2>SIGN IN TO MUSIC SPARK DASHBOARD</h2>
<div class="form-div">

    <input type="text" name="name-user"autocomplete="off" value="<?php if(isset($_POST["name-user"])) echo $_POST['name-user']; ?>" class="in" placeholder="Name" required>
</div>
<div class="form-div">
    <input type="password" name="password" autocomplete="off" class="in" placeholder="Password" required>
</div>
    <input type="submit" value="SUBMIT" name="btnsubmit" class="btn-f">
  </form>
  </div>

</body>
</html>