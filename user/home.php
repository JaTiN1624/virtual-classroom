<?php
// Start the session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit(); // Stop further script execution
}

// Check if session variables are set
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';

?>
<?php error_reporting(E_ALL); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Books DETAILS</title>
    

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <style>
        .nav{
            color:#fff;
            font-weight:bold;
        }
    </style>
</head>
<body>
<!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand"  href="instructor.php">virtual Classroom </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="intructor.php">Home</a>
        </li>
        <li class="nav-item nav">
          <a class="nav-link" href="courses.php">Classes</a>
        </li>
        <li class="nav-item nav">
        <a class="nav-link" href="logout.php">Logout</a>
       </li>
       <li class="nav-item nav">
        <a class="nav-link" href="logout.php">  <?php echo htmlspecialchars($user_name)?></a>
       </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar end -->





<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 id='show'></h3>
                  
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Course Credit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require 'config.php';

                            $query = "SELECT * FROM coursedetails1 
                                LEFT JOIN user ON coursedetails1.Course_ID = user.id 
                                WHERE user.id = '{$_SESSION['user_id']}' AND c_id IS NULL";
                            
                            $query_run = mysqli_query($con, $query);
                        
                            
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                                
                                foreach($query_run as $instructor)
                                {
                                  ?>
                                    <tr>
                                        
                                        <td><?= $instructor['Course_ID'] ?></td>
                                        <td><?= $instructor['Course_Name'] ?></td>
                                        <td><?= $instructor['Course_credit'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$instructor['Course_ID'];?>" class="deleteStudentBtn1 btn btn-danger btn-sm">Delete</button>
                                            <button type="button" id="instructorview" data-stu-name="<?=$instructor['Course_Name'];?>"  data-stu-id="<?=$instructor['Course_ID'];?>" class="viewStudentBtn btn btn-info btn-sm">View Books</button>
                                            <button type="button" id="userview" data-stu-name="<?=$instructor['Course_Name'];?>"  data-stu-id="<?=$instructor['Course_ID'];?>" class="viewUserBtn btn btn-secondary btn-sm">View Users</button>

                                            
                                        </td> 
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
</body>
</html>
