<?php

require_once('connect.php');
session_start();
if(isset($_SESSION['key'])){
	
	header('Location:home.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Library System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
	<link rel="manifest" href="fav/site.webmanifest">
	<link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container sbar_collapsed">
	<!-- sidebar menu area start -->
	<div class="sidebar-menu">
		<div class="sidebar-header">
			<div class="logo">
            <a href="home.php"><img src="fcrit.svg" width="150" height="155" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li><a href="index.php"><i class="ti-map-alt"></i> <span>Login</span></a></li>
                    <li><a href="registration.php"><i class="ti-map-alt"></i> <span>Register</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
<!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left" hidden>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left" hidden>
                            <form action="back.php" method="POST">
                                <input type="text" name="searchquery" placeholder="Search..." onchange="this.form.submit();" required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area" hidden>
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                    </div>
                </div>
            </div>
            <!-- page title area end -->
  
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
           <form name="login_form" method="post" action="loginauthenticate.php" > 
			<br/>
			<div class="form-group col-md-12"><center>
				<img src="fav/android-chrome-512x512.png" width="150" height="155" alt="logo">
				<h2 style="color:#8655FC;">LOGIN</h2></center>
			</div>
		</br>
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="rollno" maxlength=6 placeholder="Student ID" required>
            <p id="error" class="error1"></p>
        </div>

        <div class="form-group col-md-12">
            <input type="password" class="form-control" name="pass" placeholder="Password" required><span id="pass"></span></br></center>
        <p id="demo" class="error1"></p>
        </div>

        <div class="form-group col-md-12">
            <input type="submit" value="Login" class="btn btn-primary">
			<br/>
			<br/>
			<span>Don't have an account? <a href="registration.php">Register</a>.</span>
        </div>
    </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>&copy; Copyright <?php echo date('Y') ?>. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>