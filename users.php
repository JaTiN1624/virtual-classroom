<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP CRUD using  ajax</title>
    

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
    <a class="navbar-brand"  href="student.php">Virtual Classroom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="instructor.php">Home</a>
        </li>
        <li class="nav-item nav">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>
      </ul>
    
    </div>
  </div>
</nav>
<!-- navbar end -->

<!-- button for go back  -->
<div class="">
<button onclick="goBack()" onclick="reloadPreviousPage()"  class="viewStudentBtn btn btn-primary m-3">Go Back</button>

</div>
<script>
        function goBack() {
            window.history.back();

        }
        function reloadPreviousPage() {
        window.history.back();
    }
    </script>
    <!-- button for go back -->


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
                              <th>User ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require 'conn.php';
                            $course_id = $_GET['s_id'];
                          
                           $query = "SELECT * FROM user 
                              LEFT JOIN coursedetails1 ON user.c_id = coursedetails1.Course_ID 
                              WHERE coursedetails1.Course_ID = '$course_id'";
                    
                               $query_run = mysqli_query($con, $query);
                        
                               
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                                foreach($query_run as $users)
                                {
                                  ?>
                                    <tr>
                                        <td><?= $users['id'] ?></td>
                                        <td><?= $users['name'] ?></td>
                                        <td><?= $users['email'] ?></td>
                                    </tr>
                                    <?php
                                    
                                }
                            }
                            ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>  
   
        // get coursename  and courseID from previous page
   function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[[\]]/g, '\\$&');
    const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

$(document).ready(function() { 
    var name = getParameterByName('name');
    var id = getParameterByName('s_id');

    document.getElementById('show').innerHTML = 'Following users are enrolled for ' + name+ '';
});

</script>

</body> 
</html>