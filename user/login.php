<?php
require "config.php";

// Start the session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the login form was submitted
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to check if the user exists
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user's data
        $user = mysqli_fetch_assoc($result);

        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name']; 
            $_SESSION['email'] = $user['email'];

            // Redirect to home page
            header("Location: home.php");
            exit(); // Stop further script execution
        } else {
            echo "<p style='color:red;'>Invalid password. Please try again.</p>";
        }
    } else {
        echo "<p style='color:red;'>No user found with this email.</p>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Virtual Classroom</title>
    

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <style>
        .nav{
            color:#fff;
            font-weight:bold;
        }
        .container{
            margin: 100px;
            margin-left:20rem;
             width: 400px;
            height:auto;
           
        }
    </style>
</head>
<body?>
<!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand"  href="#">Virtual Classroom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item nav">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>
      </ul>
    
    </div>
  </div>
</nav>

<!-- login form  -->
<div class="container" id="contentshow">
 <form action="" method="POST" id="login">
  <div class="form-group">
    <label for="InputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="InputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" required>
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
  <p>Don't have an account? <a href="register.php">Register</a></p>
</form>
</div>
      </body>

</html>