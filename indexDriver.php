<?php

require 'Admin/helpers/DBConnection.php';


 $id=$_SESSION['user_driver']['id'];
 $sql ="SELECT * FROM driver where id=$id" ;
 
 $data = mysqli_query($con, $sql);
 

 
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
                                <a class="nav-link" href="userhome.php">USERHOME</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="indexClient.php">PROFIL</a>
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



    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>
                <?php echo 'welcome'.' '.$_SESSION['user_driver']['name'];?>
            </h1>



            <?php

            if (isset($_SESSION['Message'])) {

                unset($_SESSION['Message']);
            }


            ?>


        </div>


        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Image</th>
                <th>phone</th>
                <th>driving_license</th>
                <th>action</th>
            </tr>
            <?php

            while ($raw = mysqli_fetch_assoc($data)) {

            ?>

            <tr>

                <td><?php echo $raw['id']; ?></td>
                <td><?php echo $raw['name']; ?></td>
                <td><?php echo $raw['email']; ?></td>
                <td> <img src="upload/images/<?php echo $raw['image']; ?>" width="80" height="80"> </td>
                <td><?php echo $raw['phone'];?></td>
                <td><?php echo $raw['driving_license'];?></td>
                <td>
                    <a href='deletDriver.php?id=<?php echo $raw['id']; ?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='editDriver.php?id=<?php echo $raw['id']; ?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>

            </tr>
            <?php }?>
        </table>
        <?php include  'views/footer.php'; ?>


</body>

</html>