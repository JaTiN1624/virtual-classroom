<?php 
 require "config.php";
if (isset($_POST['register'])) {
    // Retrieve and sanitize form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    
    // Check if email already exists
    $email_check_query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($con, $email_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        echo "<p style='color:red;'>Email already registered. Please login.</p>";
    } elseif ($password !== $confirm_password) {
        echo "<p style='color:red;'>Passwords do not match. Please try again.</p>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user into the database
        $query = "INSERT INTO user (name,email,contact,password) VALUES ( '$name','$email','$contact', '$hashed_password')";
        
        if (mysqli_query($con, $query)) {
            // Registration successful
            $_SESSION['email'] = $email;
            header("Location: login.php");
        } else {
            echo "<p style='color:red;'>There was an error registering. Please try again later.</p>";
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
<div class="container" id="contentshow">
  <form action="" method="POST" id="register">
  <div class="form-group">
      <label for="InputEmail1">Name</label>
      <input type="text" name="name" class="form-control" id="InputName1"  placeholder="Enter Name" required>
    </div>
    <div class="form-group">
      <label for="InputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="InputEmail1">Contact </label>
      <input type="text" name="contact" class="form-control" id="InputContact1" aria-describedby="emailHelp" placeholder="Enter Contact Number" required>
      
    </div>
    <div class="form-group">
      <label for="InputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="InputPassword2">Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" id="InputPassword2" placeholder="Confirm Password" required>
    </div>
    <button type="submit" name="register" class="btn btn-primary">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </form>
</div>
</body>

</html>