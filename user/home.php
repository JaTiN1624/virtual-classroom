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
       <li class="nav-item nav ml-auto ">
        <a class="nav-link" href="#">  <?php echo htmlspecialchars($user_name)?></a>
       </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar end -->




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
    </style>
</head>
<body>

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
                  <h3 id='show'> <?php echo htmlspecialchars($user_name)?> is not Enrolled for following Courses    </h3>
                  
 
              
                </div>
                <div class="card-body">
                  
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Course Credit</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require 'config.php';
                          
                              $query ="SELECT coursedetails1.*, user_enrolled.u_id AS enrollment_id
                                FROM coursedetails1
                                 LEFT JOIN user_enrolled ON coursedetails1.Course_ID = user_enrolled.c_id 
                                 WHERE user_enrolled.u_id IS NULL";

                               
                            
                               $query_run = mysqli_query($con, $query);
                        
                               
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                                foreach($query_run as $student)
                                {
                                  ?>
                                    <tr>
                                   
                                        <td><?= $student['Course_ID'] ?></td>
                                        <td><?= $student['Course_Name'] ?></td>
                                        <td><?= $student['Course_credit'] ?></td>
                                        <td><?= $student['Start_date'] ?></td>
                                        <td><?= $student['End_Date'] ?></td>
                                        <td>

                                           <div class="form-check">
                                          <input class="crs form-check-input" type="checkbox" value="<?= $student['Course_ID'] ?>"                           
                                          id="flexCheckDefault_<?= $student['Course_ID'] ?>">
                                          <label class="form-check-label" for="flexCheckDefault_<?= $student['Course_ID'] ?>">
                                               
                                          </label>
                                         </div>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                    
                                }
                            }
                            ?>
<button type="button" id="add_course1"  class="viewStudentBtn btn btn-primary  m-3">Add Courses</button>

  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>  
   
        // get username and rollnumber from previous page
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

$(document).ready(function(){

  var person_id = "<?php echo $_SESSION['user_id']; ?>";
    $(document).on('click', '#add_course1', function (e) { 
        e.preventDefault();
       
        var courses = [];
        
        $(".crs").each(function(){
            if($(this).is(":checked")){
                  courses.push($(this).val());
            }
        });
        
        courses = courses.toString();
     
        
        if(courses.length !== 0){
           $.ajax({
            url :"add_course1.php",
             method : "POST",
            data : {courses:courses , person_id:person_id},
            success : function(response){
             
              var res = jQuery.parseJSON(response);
                        if(res.status == 500){

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
            }
        });
        }else{
           alert("please select at least one course")
         }
    });
});

</script>

</body> 
</html>
</body>
</html>
