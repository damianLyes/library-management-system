<?php
require_once('connect.php');
session_start();

if(!isset($_SESSION['key'])){
	
	header('Location:index.php');
}

include('header.php');
include('navbar.php');

$sid = $_SESSION['key'];
$select_issued = "SELECT COUNT(*) FROM issued_books WHERE student_rollno='$sid'";
$query_issued = mysqli_query($conn,$select_issued);
$rows_issued = mysqli_fetch_row($query_issued);
$books_issued = $rows_issued[0];

$pending_return = "SELECT COUNT(*) FROM issued_books WHERE student_rollno='$sid' AND RENEWED_DATE IS NULL";
//SELECT * FROM book,issued_books WHERE book.ISBN = issued_books.ISBN AND student_rollno=$a
$query_return = mysqli_query($conn, $pending_return);
$pending_return = mysqli_fetch_row($query_return); 
$pending_books = $pending_return[0];

// books_to_return if renewed_date="", print0 else count 
?>
	<div class="main-content-inner">
        <div class="row">
		
			<div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                    <i class="ti-menu-alt icons card-liner-icon mt-2"></i>
                                    <div class="card-liner-content">
                                        <h2 class="card-liner-title"><?php echo $books_issued; ?></h2>
                                        <h6 class="card-liner-subtitle">Books Issued</h6> 
                                    </div>                                
                                </div>
                            </div>
                        </div>
            </div>

					<div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                    <i class="ti-control-backward icons card-liner-icon mt-2"></i>
                                    <div class="card-liner-content">
                                        <h2 class="card-liner-title"><?php echo $pending_books; ?></h2>
                                        <h6 class="card-liner-subtitle">Books To Return</h6> 
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
		
        </div>
	</div>
        <!-- main content area end -->
        
    <?php include('footer.php');?>