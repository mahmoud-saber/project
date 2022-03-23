<?php
require 'Admin/helpers/DBConnection.php';
require 'Admin/helpers/functions.php'; 

$id = $_GET['id'];

$sql = "select * from driver where id=$id "; 
$op  = mysqli_query($con,$sql); 
$data = mysqli_fetch_assoc($op);







if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name     = Clean($_POST['name']);
    $email    = Clean($_POST['email']);
    $phone    =clean($_POST['phone']);
    $license  = Clean($_POST['driving_license']);


    $errors = [];

    if (empty($name)) {
        $errors['name'] = "Field Required";
    }


    if (empty($email)) {
        $errors['email'] = "Field Required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email']   = "Invalid Email";
    }
    if (empty($phone)) {
        $errors['phone'] = "Field Required";
    }/*
    elseif (!filter_var($phone, FILTER_VALIDATE_INT)) {
        $errors['phone']   = "Invalid phone";
    }*/
    elseif (strlen($phone) < 11) {
        $errors['phone'] = "Length Must be == 11 number";
    }
    
    if (empty($license)) {
        $errors['driving_license'] = "Field Required";
    } elseif (strlen($license) < 14) {
        $errors['pdriving_licensehone'] = "Length Must be == 14 number";
    }



  # Validate Image ... 
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

        
        $sql = "update driver set name = '$name' , email = '$email' , image = '$FinalName',phone='$phone',driving_license='$license' where id=$id ";


         $op =  mysqli_query($con,$sql);

       if($op){
            $message =  'Updated';
    
            $_SESSION['Message'] = $message;

            header("Location: indexDriver.php");

       }else{
           echo 'Error Try Again '.mysqli_error($con);
       }


       mysqli_close($con);

    }
}
require 'views/header.php';

?>



<body>
    <div class="animationload">
        <div class="loader"></div>
    </div>

    <!-- BACK TO TOP SECTION -->
    <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

    <!-- HEADER -->
    <div class="header header-1">

        <!-- TOPBAR -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-8 col-md-6">
                        <div class="info">
                            <div class="info-item">

                                <i class="fa fa-phone"></i> 01066258970
                            </div>
                            <div class="info-item">
                                <i class="fa fa-envelope-o"></i> <a href="booking@gmail.com"
                                    title="">booking@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-6">
                        <div class="sosmed-icon pull-right d-inline-flex">
                            <a href="#" class="fb"><i class="fa fa-facebook"></i></a>

                            <a href="#" class="ig"><i class="fa fa-instagram"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NAVBAR SECTION -->
        <div class="navbar-main">
            <div class="container">
                <nav id="navbar-example" class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="home.php">
                        <img src="public/images/book.png" alt="" width=200px height=90px>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="driverhome.php">Driver Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="editDriver.php">Update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">LOGOUT</a>
                            </li>

                        </ul>
                    </div>
                </nav> <!-- -->

            </div>
        </div>

    </div>
    <div class="container">
        <h2>Update Account</h2>

        <form action="editDriver.php?id=<?php echo $data['id'];?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" required id="exampleInputName" aria-describedby="" name="name"
                    placeholder="Enter Name" value="<?php echo $data['name']?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Phone</label>
                <input type="number" class="form-control" required id="exampleInputName1" aria-describedby="emailHelp"
                    name="phone" placeholder="Enter phone" value="<?php echo $data['phone']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" placeholder="Enter email" value="<?php echo $data['email']?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">driving_license </label>
                <input type="number" class="form-control" required id="exampleInputName1" aria-describedby="emailHelp"
                    name="driving_license" placeholder="Enter driving_license "
                    value="<?php echo $data['driving_license']?>">
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
    <?php  require 'views/footer.php';
?>

</body>

</html>