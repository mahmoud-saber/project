<?php
# Logic ...... 
##########################################################################################################
require 'Admin/helpers/DBConnection.php';
require 'Admin/helpers/functions.php';
#######################################################

##fetch data of trip
$sql = "select * from trip";
$trip_sql = doQuery($sql);

// //////////////////////////
$sql = "select * from client";
$client_sql = doQuery($sql);



// //////////////////////////
##fetch data of payment
$sql = "select * from payment";
$payment_sql = doQuery($sql);

########################################################
if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE ..... 
    $num_passengers	   = Clean($_POST['num_passengers']);
    $date              = Clean($_POST['date']);
    $trip_id           = Clean($_POST['trip_id']);
    $payment_id = Clean($_POST['payment_id']);

   
    # VALIDATE INPUT ...... 
    $errors = []; 
    if(!Validate($num_passengers,'required')){      
        $errors['num_passengers'] = "Field Required";
    } 
    if(!Validate($date,'required')){      
        $errors['date'] = "Field Required";
    }
    elseif(!Validate($date,'date')) {
        $errors['date'] = "Invalid Format";
    }
    elseif(!Validate($date,'nextdate')) {
        $errors['date'] = "Invalid Expired";
    }
    
   
    
    if(!Validate($trip_id,'required')){      
        $errors['trip_id'] = "Field Required";
    }
    if(!Validate($payment_id,'required')){      
        $errors['payment_id'] = "Field Required";
    }
    


    # Checke errors 
    if(count($errors) > 0){
       $_SESSION['Message'] = $errors;
    }else{
       $date =strtotime($date);
       $id_client=$_SESSION['user_client']['id'];
       $sql = "insert into booking (date,client_id,num_passengers,trip_id,payment_id) values ($date, $id_client, $num_passengers ,$trip_id,$payment_id)"; 
       $op  = doQuery($sql);


       if($op){
           $message = ["Message" => "Raw Inserted"];
       }else{
           $message = ["Message" => "Error Try Again"]; 
       }

       $_SESSION['Message'] = $message; 


    }


}

##########################################################################################################





?>



<?php include 'views/header.php';?>

<body>

    <!-- LOAD PAGE -->
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
                                <a class="nav-link" href="home.php">HOME</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="userhome.php">Client HOME</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="Creat.php">Booking</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="logout.php">LOGOUT</a>
                            </li>
                        </ul>
                    </div>

                </nav> <!-- -->

            </div>
        </div>

    </div>

    <!-- BANNER -->
    <div id="oc-fullslider" class="banner">
        <div class="owl-carousel owl-theme full-screen">
            <div class="item">
                <img src="public/images/drivers.jpg" alt="Slider">
                <div class="overlay-bg"></div>
                <div class="container d-flex align-items-center">
                    <div class="wrap-caption">
                        <h5 class="caption-supheading">Welcome to Bookig Trip</h5>
                        <h1 class="caption-heading">Best driver</h1>
                        <a href="#" class="btn btn-secondary">LEARN MORE</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="public/images/buses.jpg" alt="Slider">
                <div class="overlay-bg"></div>
                <div class="container d-flex align-items-center">
                    <div class="wrap-caption">
                        <h5 class="caption-supheading">Welcome to Bookig Trip</h5>
                        <h1 class="caption-heading">Best Bus </h1>
                        <a href="#" class="btn btn-secondary">LEARN MORE</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="public/images/travel.jpeg" alt="Slider">
                <div class="overlay-bg"></div>
                <div class="container d-flex align-items-center">
                    <div class="wrap-caption">
                        <h5 class="caption-supheading">Welcome to Bookig Trip</h5>
                        <h1 class="caption-heading">Best Pasngers</h1>
                        <a href="#" class="btn btn-secondary">LEARN MORE</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-nav owl-nav"></div>
    </div>

    <!-- WELCOME TO KIDS -->
    <div class="section">
        <div class="container">
            <?php PrintMessages();?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName">NameTrip</label>
                    <select class="form-control" id="exampleInputName" aria-describedby="" name="trip_id">

                        <option value="" selcted>Enter Name Trip</option>
                        <?php 
                            while($data= mysqli_fetch_assoc($trip_sql )){?>

                        <option value="<?php echo $data['id']?> "><?php echo $data['name_trip']?>
                            <?php echo date('Y/m/d',$data['date']); ?>
                        </option>

                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Booking date </label>
                    <input type="date" class="form-control" id="exampleInputName" aria-describedby="" name="date"
                        placeholder="Enter Booking date ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Nubmers of Passengers</label>
                    <input type="number" class="form-control" id="exampleInputName" aria-describedby=""
                        name="num_passengers" placeholder="Enter  num_passengers">
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Payment_Method</label>
                    <select class="form-control" id="exampleInputName" aria-describedby="" name="payment_id">
                        <option value="" selcted>Payment_Method</option>

                        <?php 
                while($data= mysqli_fetch_assoc($payment_sql ) ){
                    ?>
                        <option value="<?php echo $data['id']?> "><?php echo $data['method']?> </option>

                        <?php } ?>
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>



        </div>

    </div>

    <!-- FUNFACT -->

    <!-- FOOTER SECTION ---------------------------------------------------------- -->

    <?php include  'views/footer.php'; ?>
</body>

</html>