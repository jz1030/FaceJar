<?php
  session_start();
  include_once 'server/connection_fj.php';
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

    <!-- loading post-->
    <div class="container" style="margin-top:2%;">
      <?php
        $sql_file = "SELECT * FROM POST WHERE username = '".$_SESSION['session_user']."' ORDER BY ptime DESC";
        $result_file = $conn->query($sql_file);
        if ($result_file->num_rows > 0) {
          while ($row = $result_file->fetch_assoc()) {
            echo '<div class="row centered-form center-block">
                    <div class="col">
                      <div class="media border p-3 mb-3">
                        <img src="images/icon_face.png" alt="User_Photo" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                        <div class="media-body">';
            echo "<h5 class='mt-0'>". $row['username'];
            echo "<small><i> Posted on ". $row['ptime'] ."</i></small></h5>";
            echo "<p>". $row['content'] ."</p>";

            if ($row['ptype'] == 2) {
              echo '<img class="rounded" width="40%" height="40%" src="data:image/jpeg;base64,'.
              base64_encode($row['multimedia']).'"/>';
            } else if ($row['ptype'] == 3) {
              echo '<audio controls>
              <source src="data:audio/mp3;base64,'.base64_encode($row['multimedia']). '">
                Your browser does not support the audio element.
              </audio>';
            } 

            echo "</div></div></div></div>";
          }
        }
      ?>
    </div>

    <!-- Optional JavaScript -->
    <script type = "text/javascript">
      function navInitial() {
        $("#nav_homepage").attr('class', 'nav-item active');
      }

    </script>
    
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
    
  </body>
</html>