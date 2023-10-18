<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['key'])){
	
	header('Location:page-403.html');
}
include 'header.php';
include('navbar.php');

$_SESSION['var']=0;
$ISBN="";
$ISBN_MESSAGE="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$fine='0';
	$rollno=$_POST["rollno"];
	$ISBN=$_POST["ISBN"];
	$issue_date=$_POST["issue_date"];
	$null = NULL;

	$isbn_check = "SELECT * FROM book WHERE ISBN='$ISBN' LIMIT 1";
	$roll_check = "SELECT * FROM student_table WHERE student_rollno='$rollno' LIMIT 1";
	$result_isbn = mysqli_query($conn, $isbn_check);
	$result_roll = mysqli_query($conn, $roll_check);
	if($result_isbn->num_rows === 1 && $result_roll->num_rows === 1) { // if isbn & book exists

		$query="UPDATE book SET QUANTITY=QUANTITY-1 WHERE ISBN='$ISBN' AND QUANTITY!=0";
		$res=mysqli_query($conn, $query);

		if($res){

			$sql="INSERT INTO issued_books VALUES($rollno, '$ISBN', '$issue_date', '$null', '$fine' )";
			$result=mysqli_query($conn, $sql);
			$ISBN_MESSAGE = '<div class="alert alert-success" role="alert">Book issued to ' .$rollno. '</div>';

		}
	}else{
		$ISBN_MESSAGE = '<div class="alert alert-danger" role="alert">Student ID or ISBN is Invalid</div>';

	}
	mysqli_close($conn);
}
?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12">
    		<div class="card mt-5">
			<h2 class="card-header">Issue Book</h2>
		        <div class="card-body">
	<form class="needs-validation" novalidate method="post" action="issuebooks.php"> 
		
		<div class="form-group col-md-6">
			<?= $ISBN_MESSAGE; ?>
		</div>

		<div class="form-group col-md-6">
			<input type="text" class="form-control" placeholder="Student ID" name="rollno" required>
		</div>

		<div class="form-group col-md-6">
			<input type="text" class="form-control" placeholder="ISBN" name="ISBN" required>
		</div>

		<div class="form-group col-md-6">
			<input type="date" class="form-control" placeholder="Issue Date" name="issue_date" required>
		</div>
	
		<div class="form-group col-md-6">
			<input type="submit" value="Issue" class="btn btn-primary"></input>
		</div>
	</form>
</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>