<?php


require 'conn.php';

if(isset($_POST['add_books']))
{
    $c_id = $_POST['c_id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
 

    if($name == NULL || $author == NULL   )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
            
        ];
        echo json_encode($res);
        return;
   
    }

$query = "INSERT INTO books (c_id,book_name,book_author) VALUES ('$name','$author', '$c_id')";
$query_run = mysqli_query($con, $query);

if($query_run)
{
    $res = [ 
        'status' => 200,
        'message' => 'Student Created Successfully'
    ];
    echo json_encode($res);
    return;
}
else
{
    $res = [
        'status' => 500,
        'message' => 'Student Not Created'
    ];
    echo json_encode($res);
    return;
}
}
