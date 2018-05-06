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
      div.container {
        width: 50%;
      }

      h1{ 
        font-size: 30px; 
      }
    </style>
  </head>
  <body onload="navInitial()">
    <!-- navigation bar-->
    <?php
      include_once 'header.php';
    ?>

    <!-- loading post-->
    <?php
      $sql_file = "SELECT * FROM POST WHERE username = '".$_SESSION['session_user']."'";
      $result_file = $conn->query($sql_file);
      if ($result_file->num_rows > 0) {
        while ($row = $result_file->fetch_assoc()) {
          echo "<p>". $row['username']."</p>";
          echo "<p>".$row['pid']."</p>";
          if ($row['ptype'] == 2) {
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['multimedia']).'"/>';
          } else if ($row['ptype'] == 3) {
            echo '<audio controls>
            <source src="data:audio/mp3;base64,'.base64_encode($row['multimedia']). '">
              Your browser does not support the audio element.
            </audio>';
          }
        }
      }

    ?>

    <!-- Optional JavaScript -->
    <script type = "text/javascript">
      function navInitial() {
        $("#nav_posthistory").attr('class', 'nav-item active');
      }  
      
    </script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
    
  </body>
</html>