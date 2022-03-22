<?php
require 'Admin/helpers/DBConnection.php';
function Clean($input)
{

    return  stripslashes(strip_tags(trim($input)));
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username     = Clean($_POST['username']);
    $password = Clean($_POST['password']);
    $email    = Clean($_POST['email']);
    $phone    = Clean($_POST['phone']);



    # Validate ...... 

    $errors = [];

    # validate name .... 
    if (empty($username)) {
        $errors['username'] = "Field Required";
    }


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
    # validate phone 
    if (empty($phone)) {
        $errors['phone'] = "Field Required";
    } elseif (strlen($phone) < 11) {
        $errors['phone'] = "Length Must be == 11 number";
    }
    // elseif (!filter_var($phone,FILTER_VALIDATE_INT)) {
    //     $errors['phone']   = "Invalid phone";
    // }

    # Validate Image ... 
    if (empty($_FILES['image']['name'])) {
        $errors['Image'] = "Field Required";
    } else {

        # Validate extension ..... 

        $imgType    = $_FILES['image']['type'];
        # Allowed Extensions 
        $allowedExtensions = ['jpg', 'png','jpeg'];

        $imgArray = explode('/', $imgType);

        # Image Extension ...... 
         $imageExtension =  strtolower(end($imgArray));


        if (!in_array($imageExtension, $allowedExtensions)) {
            $errors['image'] = "Invalid Extension";
        }
    }



    # Check ...... 
    if (count($errors) > 0) {
        // print errors .... 

        foreach ($errors as $key => $value) {
            # code...

            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {



        # Upload Image ..... 
        $FinalName = time() . rand() . '.' . $imageExtension;

        $disPath = 'upload/images/' . $FinalName;

        $imgTemName = $_FILES['image']['tmp_name'];


        if (move_uploaded_file($imgTemName, $disPath)) {

            $password =   md5($password);

            // code ...... 
            $sql = "insert into client (name,email,password,image,phone) values ('$username','$email','$password','$FinalName',$phone)";

            $op =  mysqli_query($con, $sql);

            if ($op) {
                echo 'Raw Inserted';
                header('Location:client.php ');
            } else {
                echo 'Error Try Again ' . mysqli_error($con);
            }


            mysqli_close($con);
        } else {
            echo 'Error In Upload File Try Again';
        }
        
    }
    
}

?>