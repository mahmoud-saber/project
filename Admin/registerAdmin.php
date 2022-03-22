<?php 

  require './helpers/DBConnection.php';
  require './helpers/functions.php';

     if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name    = Clean($_POST['name']);
      $email    = Clean($_POST['email']);
      $password = Clean($_POST['password']);



   $errors = [];  
 # Validate  name 
 if (!Validate($name, 'required')) {      
    $errors['Name'] = "Field Required";
}elseif(!validate($name,"string")){
    $errors['Name'] = "Invalid string";//////////////////////////
}   
   

   
   # Validate  email 
    if (!Validate($email, 'required')) {      
        $errors['Email'] = "Field Required";
    }elseif(!validate($email,"email")){
        $errors['Email'] = "Invalid Format";
    }


     # Validate  Password 
     if (!Validate($password, 'required')) {      
        $errors['Password'] = "Field Required";
    }elseif(!validate($password,"length")){
        $errors['Password'] = "Length must Be >= 6 Chars";
    }

    
    # Check Errors .... 
    if(count($errors) > 0){
        $_SESSION['Message'] = $errors;
    }else{
      
      #  Login Logic ...... 

       $password = md5($password);
 
       $sql =  "insert into admin (name,email,password) values ('$name','$email','$password')";
       
        $op =  mysqli_query($con, $sql);

        if ($op) {
        echo 'Raw Inserted';
        header("Location: loginAdmin.php");
        }else{
           $message = ["Message" => "Error In Your Data Try Again"];

           $_SESSION['Message'] = $message;
       }

       mysqli_close($con);


    }




     }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RS Admin</title>
    <link href="<?php  echo Url('/resources/css/styles.css')?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4 ">Create Account</h3>
                                </div>
                                <div class="card-body">

                                    <?php 
                                  
                                      PrintMessages();
                                    ?>
                                    <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputName">Name</label>
                                                    <input class="form-control py-4" id="inputName" type="text"
                                                        placeholder="Enter name" name="name" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email"
                                                aria-describedby="emailHelp" placeholder="Enter email address"
                                                name="email" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" id="inputPassword" type="password"
                                                        placeholder="Enter password" name="password" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <button class="btn btn-primary btn-block" type="submit">Create
                                                Account</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="loginAdmin.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?php  echo Url('/resources/js/scripts.js')?>"></script>
</body>

</html>