    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand">FaceJar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item" id="nav_homepage">
            <a class="nav-link" href="homepage.php">Home</a>
          </li>
          <li class="nav-item" id="nav_post">
            <a class="nav-link" href="post.php">Post</a>
          </li>
          <li class="nav-item" id="nav_posthistory">
            <a class="nav-link" href="posthistory.php">Post History</a>
          </li>
          <li class="nav-item" id="nav_profile">
            <a class="nav-link" href="profile.php">My Profile</a>
          </li>
          <li class="nav-item" id="nav_connections">
            <a class="nav-link disabled" href="connections.php">My Connections</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="<?php if (!isset($_SESSION['session_user'])) echo "display:none"; ?>">
          <li class="nav-item"> 
            <a class="nav-link" href="profile.php">
              <?php echo $_SESSION['session_user']; ?>&nbsp;&nbsp;
              <img style="width:25px;height:25px;" src="images/icon_face.png" class="rounded-circle"> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="<?php if (!isset($_SESSION['session_user'])) echo "display:none"; ?>" href ="logout.php">Log Out</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="<?php if (isset($_SESSION['session_user'])) echo "display:none"; ?>">
          <li class="nav-item">
            <a class="nav-link" href="signin.php">Sign In or Sign Up</a>
          </li>
        </ul>
      </div>
    </nav>