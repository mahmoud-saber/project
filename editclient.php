<?php
require 'Admin/helpers/DBConnection.php';
require 'Admin/helpers/functions.php';


$id = $_GET['id'];

$sql = "select * from client where id=$id "; 
$op  = mysqli_query($con,$sql); 
$data = mysqli_fetch_assoc($op);







if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name     = Clean($_POST['name']);
    $email    = Clean($_POST['email']);
    $phone    =clean($_POST['phone']);


    $errors = [];

    if (!Validate($name,'required')) {
        $errors['name'] = "Field Required";
    }


    if (!Validate($email,'required')) {
        $errors['email'] = "Field Required";
    } elseif (!Validate($email,'email')) {
        $errors['email']   = "Invalid Email";
    }
    if (!Validate($phone,'required')) {
        $errors['phone'] = "Field Required";
    }
    elseif (!Validate($phone,'phone')) {
        $errors['phone']   = "Invalid phone";
    }
    elseif (strlen($phone) < 11) {
        $errors['phone'] = "Length Must be == 11 number";
    }



  if (!empty($_FILES['image']['name'])) {

    $imgType    = $_FILES['image']['type'];
    $allowedExtensions = ['jpg', 'png','jpeg'];

    $imgArray = explode('/', $imgType);

     $imageExtension =  strtolower(end($imgArray));


    if (!in_array($imageExtension, $allowedExtensions)) {
        $errors['Image'] = "Invalid Extension";
    }
}



    if (count($errors) > 0) {

        foreach ($errors as $key => $value) {

            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {

       

        if (!empty($_FILES['image']['name'])) {


            $FinalName = time() . rand() . '.' . $imageExtension;

            $disPath = 'upload/images/' . $FinalName;
    
            $imgTemName = $_FILES['image']['tmp_name'];
    
    
            if (move_uploaded_file($imgTemName, $disPath)) {

                unlink('upload/images/'.$data['image']);
            }
        }else{
            $FinalName = $data['image'];
        }



       
       
        
        $sql = "update client set name = '$name' , email = '$email' , image = '$FinalName',phone='$phone' where id=$id ";


         $op =  mysqli_query($con,$sql);

       if($op){
           $message =  'Updated';

        $_SESSION['Message'] = $message;

        header("Location: indexClient.php");

       }else{
           echo 'Error Try Again '.mysqli_error($con);
       }


       mysqli_close($con);

    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update Account</h2>

        <form action="editclient.php?id=<?php echo $data['id'];?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" required id="exampleInputName" aria-describedby="" name="name"
                    placeholder="Enter Name" value="<?php echo $data['name']?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Phone</label>
                <input type="text" class="form-control" required id="exampleInputName1" aria-describedby="emailHelp"
                    name="phone" placeholder="Enter phone" value="<?php echo $data['phone']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" placeholder="Enter email" value="<?php echo $data['email']?>">
            </div>


            <div class="form-group">
                <label for="exampleInputName">Image</label>
                <input type="file" name="image">
            </div>

            <img src="upload/images/<?php echo $data['image'];?>" alt="" height="90" width="90">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>