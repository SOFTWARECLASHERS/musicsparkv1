    <?php

if (isset($_POST['submit-btn-model'])) {
  require 'fetch.php';
}
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title></title>
      <script src="../js/jquery-3.5.1.min.js?v=<?php echo time(); ?>"></script>
   <style >
     .modal-push-popup{
  position: fixed;
  z-index: 2;
  /*justify-content: center;*/
  align-items: center;
  height: 50vh;
  width: 500px;
  padding: 1rem 2rem;
  top: 20%;
  right: 400px;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 10px 25px rgba(92,99,105,.2);
}
.modal-push-popup .box-popup{
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
}
.modal-push-popup .box-popup .inputs{
  display: grid;
  align-items: center;
  margin-right: 20px;
}
.modal-push-popup .box-popup .inputs div{
  margin-bottom: 10px;
}
.modal-push-popup .box-popup .inputs div input{
    padding: 1rem;
    width: 100%;
    height: 100%;
    border-radius: .5rem;
    outline: none;
    background: none;
    border: 1px solid #DADCE0;
    padding-left: 1rem;
    font-family: var(--font-roboto);
    font-weight: 600;
    z-index: 1;  
    text-transform: lowercase;
}
.modal-push-popup .box-popup .inputs div input:focus{
    transition: 0.4s;
    border: 1px solid #fff !important;
    box-shadow: 0 0 20px rgb(0 0 0 / 8%);
}
.modal-push-popup .box-popup .img-bx .dr-w{
    width: 215px !important;
    border-radius: 10px !important;
    height: 160px !important;
}
.modal-push-popup .button button{
    padding: .75rem 2rem;
    outline: none;
    border: none;
    outline: none;
    background: #1A73E8;
    color: #fff;
     border-radius: .5rem;
    cursor: pointer;
    transition: 0.3s;
    font-family: var(--font-roboto);
    width: -webkit-fill-available;
    font-weight: 600;
}
.modal-push-popup .button button:hover{
   box-shadow: 0 10px 36px rgba(0,0,0,.15);
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
     border: 4px dashed #009578;
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
     <div class="modal-push-popup">
      <span class="spnone">CREATE USER ACCOUNT</span>
     <span class="fas fa-times" id="close-popup-model"></span>
     <form method="POST" action="" enctype="multipart/form-data">
      <div class="box-popup">
        <div class="inputs">
          <div>
           <input type="text" placeholder="NAME" name="username" id="name" autocomplete="off">
          </div>
          <div>
           <input type="password" placeholder="PASSWORD" name="password" id="password" autocomplete="off">
          </div>
        </div>
        <div class="img-bx">
            <div class="team__link focus--box-shadow drop-zone-first dr-w">
            <span class="drop-zone__prompt" >Drop File Here Or Click Here To Upload</span>
             <input type="file" name="file-img" id="drop-zone-input" style="display: none;" >
           </div>
        </div>
        <!-- <input type="file" name="file-img"> -->
      </div>
      <div class="button">
        <button name="submit-btn-model" id="submit" type="submit">
           CREATE ACCOUNT
        </button>
</form>
      </div>
      <script>
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
        thumbnailElement.style.background = 'blue';
      }else{
        thumbnailElement.style.background = '#cccccc';
      }
    }
      </script>
    </body>
    </html>
    
   