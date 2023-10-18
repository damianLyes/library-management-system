<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['key'])){
	
	header('Location:page-403.html');
}

include('header.php');
include('navbar.php');

$select_book = "SELECT COUNT(*) FROM book";
$query_book = mysqli_query($conn,$select_book);
$rows_book = mysqli_fetch_row($query_book);
$listed_books = $rows_book[0];

$select_issued = "SELECT COUNT(*) FROM issued_books";
$query_issued = mysqli_query($conn,$select_issued);
$rows_issued = mysqli_fetch_row($query_issued);
$issued_books = $rows_issued[0];

$select_quantity = "SELECT SUM(QUANTITY) AS quantity_sum FROM book";
$result = mysqli_query($conn, $select_quantity); 
$fetch_quantity = mysqli_fetch_assoc($result); 
$sum = $fetch_quantity['quantity_sum'];

$pending_return = "SELECT COUNT(*) AS total FROM issued_books WHERE RENEWED_DATE IS NULL";
$query_return = mysqli_query($conn, $pending_return);
$fetch_total = mysqli_fetch_assoc($query_return); 
$total_pending_return = $fetch_total['total'];

?>  
	<div class="main-content-inner">
        <div class="row">
		
			<div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                    <i class="ti-menu-alt icons card-liner-icon mt-2"></i>
                                    <div class="card-liner-content">
                                        <h2 class="card-liner-title"><?php echo $listed_books; ?></h2>
                                        <h6 class="card-liner-subtitle">Books Listed</h6> 
                                    </div>                                
                                </div>
                            </div>
                        </div>
            </div>
					<div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                    <i class="ti-agenda icons card-liner-icon mt-2"></i>
                                    <div class="card-liner-content">
                                        <h2 class="card-liner-title"><?php echo $issued_books; ?></h2>
                                        <h6 class="card-liner-subtitle">Issued Books</h6> 
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-12 col-sm-6 col-xl-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex px-0 px-lg-2 py-2 align-self-center">
                                    <i class="icon-book-open icons card-liner-icon mt-2"></i>
                                    <div class="card-liner-content">
                                        <h2 class="card-liner-title"><?php echo $sum; ?></h2>
                                        <h6 class="card-liner-subtitle">Total Books Listed</h6> 
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
                                        <h2 class="card-liner-title"><?= $total_pending_return ?></h2>
                                        <h6 class="card-liner-subtitle">Books Pending Return</h6> 
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
	</div>

        <!-- main content area end -->
        
    <?php include('footer.php');?>
    
