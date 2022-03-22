<?php

require_once 'Admin/helpers/DBConnection.php';

function Clean($input)
{

    return  stripslashes(strip_tags(trim($input)));
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $password = Clean($_POST['password']);
    $email    = Clean($_POST['email']);


    # Validate ...... 

    $errors = [];



    # validate email 
    if (empty($email)) {
        $errors['email'] = "Field Required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email']   = "Invalid Email";
    }


    # validate password 
    if (empty($password)) {
        $errors['password'] = "Field Required";
    } elseif (strlen($password) < 6) {
        $errors['Password'] = "Length Must be >= 6 chars";
    }





    # Check ...... 
    if (count($errors) > 0) {
        // print errors .... 

        foreach ($errors as $key => $value) {
            # code...

            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {

        // Login Logic ...... 

        $password = md5($password);

        $sql = "select * from driver where email = '$email' and password = '$password' "; 
        $result = mysqli_query($con,$sql); 

        if(mysqli_num_rows($result) == 1){
            // code .. 

        # Fetch Usre Data ....     
        $data = mysqli_fetch_assoc($result); 

        # Create Session ..... 
        $_SESSION['user_driver'] = $data; 

        header("Location: driverhome.php");

        }else{
            echo 'Error In Login Try Again ';
        } 

  


    }
}

?>