<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <title>Homepage</title>

    <!-- set up style-->
    <style>

    </style>
  </head>
  <body onload="navInitial()">
    <!-- navigation bar-->
    <?php
      include_once 'header.php';
    ?>
    <div class="container" style="margin-top:12%;width:60%;">
      <div class="row centered-form center-block">
        <div class="col">
          <!-- upload file -->
          <form enctype="multipart/form-data" class="upload" id="post_form">
             <!-- write a post -->
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Write a post! </label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="exampleFormControlTextarea1" rows="3" placeholder="No more than 200 characters...">
              </textarea>
            </div>
            
            <br/>
            <br/>

            <!-- choose file -->
            <div class="form-group">
              <div class="custom-file">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="inputGroupFile01" onchange= "getFile(this.value);"/>
                <label class="custom-file-label" for="inputGroupFile01" id = "get_filepath" style="color:#6c757d;opacity:1;">You can only upload Photo, Music or Video</label>
              </div>
            </div>    
            <input class="btn btn-primary" type="submit" name="submit" value="Post"/>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <script type = "text/javascript">
      window.onload = function(){
        $("#post_form").on('submit', function(e){
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'server/facejar_post.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
              alert("ajax");
              if (data == 'input_error') {
                alert("No input");
              }
              if (data == 'ok') {
                alert("post success");
              } else {
                alert("post fail");
              }
            }
          });
        });
      };

      function navInitial() {
        $("#nav_post").attr('class', 'nav-item active');
      }

      function getFile(filename){
        var pos = filename.lastIndexOf("\\");
        document.getElementById("get_filepath").innerHTML = filename.substring(pos + 1);
      }

        // file type validation
        /*$("#inputGroupFile01").change(function() {
          var file = this.files[0];
          var imagefile = file.type;
          var match= ["image/jpeg","image/png","image/jpg"];
          if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#inputGroupFile01").val('');
            return false;
          }
        });*/

    </script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
  </body>
</html>