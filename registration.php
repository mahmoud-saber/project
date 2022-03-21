<?php
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
                    <a class="navbar-brand" href="index.html">
                        <img src="public/images/book.png" alt="" width=200px height=90px>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">HOME</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="registration.php">REGISTRATION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="client.php">CLIENT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="driver.php">DRIVERS</a>
                            </li>

                        </ul>
                    </div>
                </nav> <!-- -->

            </div>
        </div>

    </div>

    <!-- BANNER -->
    <div class="section banner-page" data-background="public/images/regisistration.png">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">REGISTRATION</div>
            </div>
        </div>
    </div>

    <!-- SHORTCUT -->
    <div class="section services">
        <div class="content-wrap pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="row col-0 no-gutters">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <!-- BOX 1 -->
                                <a href="Client/Regclient.php">
                                    <div class="rs-feature-box-1 bg-primary">
                                        <i class="fa fa-users"></i>
                                        <div class="body">
                                            <h1>CLIENTS</h1>

                                            <div class="spacer-10"></div>
                                            <a href="Client/Regclient.php" class="btn">SIGN UP</a>
                                        </div>
                                    </div>
                                </a>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <!-- BOX 4 -->
                                <a href="Driver/Regdriver.php">
                                    <div class="rs-feature-box-1 bg-fifth">
                                        <i class="fa fa-car"></i>
                                        <div class="body">
                                            <h1>DRIVERS</h1>

                                            <div class="spacer-10"></div>
                                            <a href="Driver/Regdriver.php" class="btn">SIGN UP</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WHY CHOOSE US -->
    <div class="section">
        <div class="content-wrap pb-0">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <p class="supheading">Why Choose Us</p>
                        <h2 class="section-heading mb-5">
                            Best Booking
                        </h2>
                        <p class="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                            euismod. Praesent interdum est gravida vehicula est node maecenas loareet morbi a dosis
                            luctus novum est praesent. Praesent interdum est gravida vehicula est node maecenas loareet
                            morbi a dosis luctus novum est praesent.</p>
                        <p class="p-check ">100% education, for your kids, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod.</p>
                        <p class="p-check ">More programs activities, sed diam nonummy nibh euismod. Lorem ipsum dolor
                            sit amet.</p>
                        <p class="p-check ">More benefit nonummy nibh euismod. Lorem ipsum dolor sit amet, consectetuer
                            adipiscing elit.</p>
                        <div class="spacer-90"></div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <img src="images/dummy-img-600x700.jpg" alt="" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- WELCOME TO KIDS -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <img src="images/logo page.png" alt="" class="img-fluid img-border">
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

    <!-- CTA -->
    <div class="section bg-tertiary">
        <div class="content-wrap py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12">
                        <div class="cta-1">
                            <div class="body-text mb-3">
                                <h3 class="my-1 text-secondary">Let's join the best kindergarten now!</h3>
                                <p class="uk18 mb-0 text-white">We provide high standar clean website for your business
                                    solutions</p>
                            </div>
                            <div class="body-action">
                                <a href="contact.html" class="btn btn-primary mt-3">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'views/footer.php' ; ?>
</body>

</html>