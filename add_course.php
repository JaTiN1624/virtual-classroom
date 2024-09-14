<?php

require 'conn.php';

$person_id = $_POST['person_id'];
$course_ids_string = $_POST['courses'];

// Convert course IDs string to an array
$course_ids = explode(',', $course_ids_string);

$array_length = count($course_ids);

for ($i = 0; $i < $array_length; $i++) {
    $query = "INSERT INTO enrollment1 (id, Course_ID) VALUES ($person_id, " . $course_ids[$i] . ")";
    $query_run = mysqli_query($con, $query);
    // if ($con->query($query) !== TRUE) {
    //     echo "Error: " . $query . "<br>" . $con->error;
    }
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Course Added Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Course Not Added'
        ];
        echo json_encode($res);
        return;
    }
$con->close();
?>
