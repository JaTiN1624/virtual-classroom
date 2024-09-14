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
      </ul>
    
    </div>
  </div>
</nav>
<!-- navbar end -->

<!-- button for go back  -->
<div class="">
<button onclick="goBack()"  class="viewStudentBtn btn btn-primary m-3">Go Back</button>

</div>
<!-- script for go back  -->
<script>
        function goBack() {
            window.history.back();
        }
    </script>
    <!-- button for go back -->


    
<!-- Add Books -->
<div class="modal fade" id="bookAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form id="saveinstructor">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
        <label for="name">Book Name</label>
        <input type="text" id="name" name="name" class="form-control"/>
   
    </div>
    <div class="mb-3">
        <label for="">Book Author</label>
        <input type="text" id="author" name="author" class="form-control"/>
        
    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="addbooks" class="btn btn-primary">Save Book</button>
            </div>
        </form>


      
        </div>
    </div>
</div>

<!-- Edit Book Modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Instructor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateStudent">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="student_id" id="student_id" >

                <div class="mb-3">
                    <label for="">Book Name</label>
                    <input type="text" name="name" id="name1" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Book Author</label>
                    <input type="text" name="email" id="email1" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Book</button>
            </div>
        </form>
        </div>
    </div>
</div>

 

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 id='show'></h3>
                  
                  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#bookAddModal">
                            Add Books
                        </button>
              
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Book Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require 'conn.php';
                            $course_id = $_GET['s_id'];
                            $query = "SELECT * FROM books 
                            LEFT JOIN coursedetails1 ON books.c_id = coursedetails1.Course_ID 
                            WHERE coursedetails1.Course_ID = '$course_id'";
                               
                            $query_run = mysqli_query($con, $query);
                        
                            
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                                
                                foreach($query_run as $book)
                                {
                                  ?>
                                    <tr>
                                        
                                        <td><?= $book['id'] ?></td>
                                        <td><?= $book['book_name'] ?></td>
                                        <td><?= $book['book_author'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$book['Course_ID'];?>" class="deleteStudentBtn1 btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>

      // get course ID and course Name from previous page
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



$(document).ready(function() { // Removed "event" from the function name
    var name = getParameterByName('name');
    var id = getParameterByName('s_id');

    document.getElementById('show').innerHTML = '' + name + ' has following Books';
});

</script>

</body> 
</html>