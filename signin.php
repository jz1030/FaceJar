<?php
  session_start();
  if (isset($_SESSION['session_user'])) {
    header("Location:homepage.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <title>Sign In</title>

    <!-- set up style-->
    <style>
      div.container {
        width: 50%;
      }

      h1{ 
        font-size: 30px; 
      }

      div.myerror {
        color: #FF5733;
      }
    </style>
  </head>
  <body>
    <!-- navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Welcome to faceJAR !</a>
    </nav>

    <!-- sigin in-->
    <div class='container' style="margin-top:5%">
      <div class="form-group">
        <h1>Already Have an Account? Sign In Here </h1>
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <div class = "myerror" id = "user_error" style = "visibility:hidden">
          This email has not been registered
        </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <div class = "myerror" id = "password_error" style = "visibility:hidden">
          Wrong Password
        </div>
      </div>
  
      <button type="submit" class="btn btn-primary" onclick="logIn()" >Sign In</button>
      <br/>
      <br/>
      <br/>
      <h1>Do not have an account? Sign Up Here </h1>
    </div>

    <!-- sign up -->
    <div class = "container">
      <form name = "sign_up_form">
        <div class="form-group">
          <label for="inputemail">Email</label>
          <input type="email" class="form-control" id="inputemail" name="inputemail" placeholder="zhangxiaohuang@gmail.com" required>
          <div class = "myerror" id = "email_error" name = "email_error" style = "visibility:hidden">
            This email has been registered
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword4">Password</label>
          <input type="password" class="form-control" id="inputpassword" name="inputpassword" placeholder="Password" required>
          <div class = "myerror" id = "password2_error" style = "visibility:hidden">
            Password must be between 6 and 16 characters in length
          </div>            
        </div>
        <div class="form-group">
          <label for="inputAddress">User Name</label>
          <input type="text" class="form-control" id="inputusername" name="inputusername" placeholder="User Name" required>
          <div class = "myerror" id = "username_error" style = "visibility:hidden">
            Invalid Username
          </div>                     
        </div>
        <div class="form-group">
          <label for="inputfirstname">First Name</label>
          <input type="text" class="form-control" id="inputfirstname" name="inputfirstname" placeholder="Xiaohuang" required>
          <div class = "myerror" id = "firstname_error" style = "visibility:hidden">
            First Name must be between 1 and 20 characters in length
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Last Name</label>
          <input type="text" class="form-control" id="inputlastname" name="inputlastname" placeholder="Zhang" required>
          <div class = "myerror" id = "lastname_error" style = "visibility:hidden">
            Last Name must be between 1 and 20 characters in length
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputaddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Address 2</label>
          <input type="text" class="form-control" id="inputaddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputcity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputstate1" name="inputstate1" class="form-control">
              <option selected>Choose...</option>
              <option value="AL">Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA">California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="DC">District Of Columbia</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputzipcode" name="inputzipcode">
            <div class="myerror" id = "zipcode_error" style = "visibility:hidden">
              Please input a valid zipcode
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="signUp()">Sign Up</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <script type = "text/javascript">
      function logIn() {
        // hide error messages
        document.getElementById("user_error").style.visibility = "hidden"; 
        document.getElementById("password_error").style.visibility = "hidden";
        $("#exampleInputEmail1").attr('class', 'form-control');
        $("#exampleInputPassword1").attr('class', 'form-control');

        var email = document.getElementById("exampleInputEmail1").value;
        var password = document.getElementById("exampleInputPassword1").value;
        var login_json = {"email": email, "password": password};
    
        $.ajax ({
          type : "POST",
          url: "server/facejar_login.php",
          data: {"login": JSON.stringify(login_json)},
          dataType: 'json',
          success: function(data) {
      
            if (data[0] == 1) {
              // data == 1 -> login success
              window.location.href='http://localhost:8888/dashabi/homepage.php';
            } else if (data[0] == 2) {
              // not registered
              document.getElementById("user_error").style.visibility = "visible"; 
              $("#exampleInputEmail1").attr('class', 'form-control is-invalid');
            } else {
              // password fail
              document.getElementById("password_error").style.visibility = "visible";
              $("#exampleInputPassword1").attr('class', 'form-control is-invalid');
            }
          }
        });
      }

      function signUp() {
        // hide error messages
        document.getElementById("email_error").style.visibility = "hidden"; 
        document.getElementById("password2_error").style.visibility = "hidden";
        document.getElementById("username_error").style.visibility = "hidden";
        document.getElementById("firstname_error").style.visibility = "hidden";
        document.getElementById("lastname_error").style.visibility = "hidden";
        document.getElementById("zipcode_error").style.visibility = "hidden";
        $("#inputemail").attr('class', 'form-control');
        $("#inputpassword").attr('class', 'form-control');
        $("#inputusername").attr('class', 'form-control');
        $("#inputfirstname").attr('class', 'form-control');
        $("#inputlastname").attr('class', 'form-control');
        $("#inputzipcode").attr('class', 'form-control');
       
        var username = document.getElementById("inputusername").value;
        var password = document.getElementById("inputpassword").value;
        var email = document.getElementById("inputemail").value;
        var firstname = document.getElementById("inputfirstname").value;
        var lastname = document.getElementById("inputlastname").value;
        var address = document.getElementById("inputaddress").value;
        var address2 = document.getElementById("inputaddress2").value;
        var city = document.getElementById("inputCity").value;
        
        var state_select = document.getElementById("inputstate1");
        var state_index = state_select.selectedIndex;
        var state = state_select.options[state_index].value;
        var zipcode = document.getElementById("inputzipcode").value;

        var user_json = {"username":username, "firstname":firstname, "lastname":lastname, "email":email, "password":password, "address":address, "address2":address2, "city":city, "state":state, "zipcode":zipcode};
        var user_string = JSON.stringify(user_json);
        $.ajax({
          type: "POST",
          url: "server/facejar_signup.php",
          data: {"user": user_string},
          dataType: 'json',
          success: function(data) {
            for (var i = 0; i < data.length; i++) {
              alert("data["+i+"] = "+ data[i]);
              if (data[i] == 0) {
                window.location.href='http://localhost:8888/dashabi/homepage.php';
              } else if (data[i] == 1) {
                // email been used
                document.getElementById("email_error").style.visibility = "visible";
                $("#inputemail").attr('class', 'form-control is-invalid');
              } else if (data[i] == 2) {
                // password length error
                document.getElementById("password2_error").style.visibility = "visible";
                $("#inputpassword").attr('class', 'form-control is-invalid');
              } else if (data[i] == 3) {
                // username been used
                var user_error = document.getElementById("username_error");
                user_error.innerHTML = "User Name has been used";
                user_error.style.visibility = "visible";
                $("#inputusername").attr('class', 'form-control is-invalid');
              } else if (data[i] == 4) {
                // username length error
                var user_error = document.getElementById("username_error");
                user_error.innerHTML = "User name must be between 1 and 20 characters in length ";
                user_error.style.visibility = "visible";
                $("#inputusername").attr('class', 'form-control is-invalid');
              } else if (data[i] == 5) {
                // firstname length error
                document.getElementById("firstname_error").style.visibility = "visible";
                $("#inputfirstname").attr('class', 'form-control is-invalid');
              } else if (data[i] == 6) {
                // lastname length error
                document.getElementById("lastname_error").style.visibility = "visible";
                $("#inputlastname").attr('class', 'form-control is-invalid');
              } else if (data[i] == 7) {
                // invalid zipcode 
                document.getElementById("zipcode_error").style.visibility = "visible";
                $("#inputzipcode").attr('class', 'form-control is-invalid');
              } else {
                // database connection error
                alert("Database Connection Error");
              }
            }
          }
        });
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