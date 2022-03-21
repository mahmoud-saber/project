<?php include 'dbconnection/connected.php';
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
                                <i class="fa fa-phone"></i> 010100656595
                            </div>
                            <div class="info-item">
                                <i class="fa fa-envelope-o"></i> <a href="mailto:booking@gmail.com"
                                    title="">boking@gmail.com</a>
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
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registration.php">REGISTRATION</a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="client.php">CLIENT</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="driver.php">DRIVERS</a>
                            </li>

                        </ul>
                    </div>
                </nav> <!-- -->

            </div>
        </div>

    </div>

    <!-- BANNER -->
    <div class="section banner-page" data-background="public/images/client.jpg">
        <div class="content-wrap pos-relative">
            <div class="d-flex justify-content-center bd-highlight mb-3">
                <div class="title-page">CLIENT</div>
            </div>
        </div>
    </div>

    <!-- forms -->
    <div class="container">
        <div class="login-content">
            <form action="loginclient.php" method="POST" name="myform">
                <div class="input-div one">
                    <div class="i1">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" class="input" name="email">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i1">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password">
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn1" value="Login" name="login">
            </form>
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
                                <h3 class="my-1 text-secondary">Let's join the best school now!</h3>
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

    <!-- FOOTER SECTION dbconnect-->
    <?php include 'views/footer.php';?>


</body>

</html>