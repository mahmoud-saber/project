<?php require 'Admin/helpers/DBConnection.php';
// include 'dbconnection/checklogin.php';

include 'views/header.php';
?>

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
                            <li class="nav-item active">
                                <a class="nav-link" href="userhome.php">USERHOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">PROFIL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Creat.php">BOOKING</a>
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
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <img src="public/images/logo.png" alt="" class="img-fluid img-border">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h2 class="section-heading">
                            Welcome to BOOKING TRIP
                        </h2>
                        <p></p>
                        <p></p>
                        <div class="spacer-10"></div>
                        <a href="#" class="btn btn-secondary">DISCOVER MORE</a>
                        <div class="spacer-30"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FUNFACT -->
    <div class="section bgi-overlay bgi-cover-center" data-background="public/images/bus-choice.jpg">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <!-- Item 1 -->
                    <div class="col-sm-6 col-md-3">
                        <div class="rs-funfact bg-primary">
                            <div class="box-fun">
                                <h2>852</h2>
                            </div>
                            <div class="title">Drivers</div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-sm-6 col-md-3">
                        <div class="rs-funfact bg-quaternary">
                            <div class="box-fun">
                                <h2>15</h2>
                            </div>
                            <div class="title">Bus </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'views/footer.php';?>
</body>

</html>