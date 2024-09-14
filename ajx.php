<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'rconn.php';

if(isset($_POST['user_registration']))
{
   
    $email = mysqli_real_escape_string($con, $_POST['useremail']);
    $password = mysqli_real_escape_string($con, $_POST['userPassword']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
    
    
    if($email == NULL || $password == NULL || $confirmpassword == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
       
        echo json_encode($res);
        return;
    }
                        // check password and confirm password 
    if($password != $confirmpassword) {
        $res = [
            'status' => 409,
            'message' => 'Passwords should be the same!'
        ];
      
        echo json_encode($res);
        return;
    }
    
                    // check email is already exist or not 
    $email = $_POST['useremail']; // get the email from the registration form

    $query = "SELECT * FROM userregistration WHERE email = '$email'";
    $result = mysqli_query($con, $query); 
    if (mysqli_num_rows($result) > 0) {
        $res = [
            'status' => 410,
            'message' => 'Email already exists!'
        ];
        echo json_encode($res);
        return;
    }


                     // convert password into hash code 
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $hashedconfirmPassword = password_hash($confirmpassword, PASSWORD_BCRYPT);

    
    $query = "INSERT INTO userregistration (email, password, confirmpassword) VALUES (?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param('sss', $email, $hashedPassword, $hashedconfirmPassword);
    
    if ($stmt->execute()) {
        $userid = $con->insert_id;
        $res = [
            'status' => 200,
            'userid' => $userid,
            'message' => 'User registered successfully!'
            
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Database error: Could not register user'
            
        ];
        echo json_encode($res);
            return;
    }
    
  
}


                        // code for login 
                        
                        
    if (isset($_POST['user_login'])) {


    $email = mysqli_real_escape_string($con, $_POST['useremail']);
    $password = mysqli_real_escape_string($con, $_POST['userPassword']);

    if ($email == NULL || $password == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    // Fetch user data
    $query = "SELECT * FROM userregistration WHERE email='$email' ";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0 ) {
        $res = [
            'status' => 401,
            'message' => "Invalid credentials"
        ];
        echo json_encode($res);
        return;
    }
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            $res = [
                'status' => 200,
                'message' => 'Login successful'
            ];
            echo json_encode($res);
           
        } else {
            $res = [
                'status' => 411,
                'message' => 'Invalid credentials'
            ];
            echo json_encode($res);
        }
    } 
             
}  

                
?>
    
