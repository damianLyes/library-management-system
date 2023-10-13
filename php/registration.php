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
                <form action="registration_authenticate.php" method="post">
				<br/>
				<div class="form-group col-md-12"><center>
				<img src="fav/android-chrome-512x512.png" width="150" height="155" alt="logo">
				<h2 style="color:#8655FC;">REGISTER</h2></center>
			</div>
		</br>
        <div class="form-group col-md-12 <?php echo (!empty($rollno_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="rollno" placeholder="Student ID">
            <span class="help-block"><?php //echo $rollno_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="fname" placeholder="First Name">
            <span class="help-block"><?php //echo $fname_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($mname_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="mname" placeholder="Middle Name">
            <span class="help-block"><?php //echo $mname_err; ?></span>
        </div>

        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="lname" placeholder="Last Name">
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($branch_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="branch" placeholder="Department">
            <span class="help-block"><?php //echo $branch_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($sem_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="sem" placeholder="Semester">
            <span class="help-block"><?php //echo $sem_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
            <input type="date" class="form-control" name="dob">
            <span class="help-block"><?php //echo $dob_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($semail_err)) ? 'has-error' : ''; ?>">
            <input type="email" class="form-control" name="semail" placeholder="Email">
            <span class="help-block"><?php //echo $semail_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="gender" placeholder="Gender">
            <span class="help-block"><?php //echo $gender_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($bg_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="bg" placeholder="Blood Group">
            <span class="help-block"><?php //echo $bg_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="contact" placeholder="Contact NO">
            <span class="help-block"><?php //echo $contact_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="address" placeholder="Address">
            <span class="help-block"><?php //echo $address_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
            <input type="password" class="form-control" name="pass" placeholder="Password">
            <span class="help-block"><?php //echo $pass_err; ?></span>
        </div>

        <div class="form-group col-md-12 <?php echo (!empty($cpass_err)) ? 'has-error' : ''; ?>">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
            <span class="help-block"><?php //echo $cpass_err; ?></span>
        </div>

        <div class="form-group col-md-12">
        <input type="submit" class="btn btn-success" value="Register"></input>
		<br/>
		<br/>
		<span>Already have an account? <a href="index.php">Login</a>.</span>

    </div>
    </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <?php include('footer.php');?>