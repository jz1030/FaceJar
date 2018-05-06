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
        margin-top: 100px;
        width: 60%;
        margin-left: 40%;

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

    <!-- list of friends -->
    
      
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" style="<?php if (isset($_GET['friend'])) echo "display:none"; ?>">
      <div class="container">
      <div class="list-group">

        <p style="text-align: center"> List of your friends </p>
      <?php
        $sql_friend = "SELECT username, ufname, ulname, university 
                   FROM Friend f, User u
                   WHERE user_s = '".$_SESSION['session_user']."' AND user_t = username";
        $result_friend = $conn->query($sql_friend);

        if ($result_friend->num_rows > 0) {
          while ($row = $result_friend->fetch_assoc()) {
            echo "<input name='friend' type='submit' class='list-group-item list-group-item-action list-group-item-success' value='".$row['username']."   ".$row['ufname']."   ".$row['ulname']."   ".$row['university']."'>";
          }
        }        
      ?>
      </div>
      </div>
    </form>


    <!-- friend homepage -->
    <div class="container">
    <?php
      if (isset($_GET['friend'])) {
        $friendname = explode(' ', $_GET['friend'])[0];
        echo "Welcome to ".$friendname." 's homepage";
        // destroy GET
        //echo "<>"
        $sql_file = "SELECT * FROM POST WHERE username = '".$friendname."'";
        $result_file = $conn->query($sql_file);
        if ($result_file->num_rows > 0) {
          while ($row = $result_file->fetch_assoc()) {
            echo "<p>". $row['username']."</p>";
            echo "<p>".$row['pid']."</p>";
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['multimedia']).'"/>';
          }
        }
      }
    ?>
  </div>

    <!-- Optional JavaScript -->
    <script type = "text/javascript">
      function navInitial() {
        $("#nav_connections").attr('class', 'nav-item active');
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