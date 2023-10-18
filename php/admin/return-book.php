<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['key'])){
	
	header('Location:page-403.html');
}
include 'header.php';
include('navbar.php');

$_SESSION['var']=0;
$ISBN=$MESSAGE="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$fine=0;
	$rollno=$_POST["rollno"];
	$ISBN=$_POST["ISBN"];
	$issue_date='';
	$r_date = $_POST["r_date"];

	$issue_date=strtotime($issue_date);
	$difference=strtotime($r_date);
	$diff=floor(abs($difference - $issue_date) / 86400);
	$diff=intval($diff);

	$query="UPDATE book SET QUANTITY=QUANTITY+1 WHERE ISBN='$ISBN' ";
	$res=mysqli_query($conn, $query);

	$sql="UPDATE issued_books SET RENEWED_DATE='$r_date' WHERE student_rollno=$rollno AND ISBN='$ISBN' ";
	$result=mysqli_query($conn, $sql);

	$quer="SELECT (To_days(RENEWED_DATE) - To_days(ISSUED_DATE)) as diff FROM issued_books WHERE student_rollno=$rollno AND ISBN='$ISBN' ";
	$result=mysqli_query($conn, $quer);
	if(mysqli_num_rows($result)>0){

		while($row=mysqli_fetch_assoc($result)){

			$difference=$row['diff'];
		}
	}

	$difference=intval($difference);

	if($difference > 7){
		$df=8;
		$fine=10;
		if($df<$difference){

			while ($df!=$difference) {
				
				$fine=$fine+2;
				$df=$df+1;
			}
		}
	}

	$sql="UPDATE issued_books SET FINE=$fine WHERE student_rollno=$rollno AND ISBN='$ISBN' ";
	$result=mysqli_query($conn, $sql);
	$MESSAGE = '<div class="alert alert-success" role="alert">' .$rollno. ' Returned a Book</div>';

	mysqli_close($conn);

}
?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12">
    		<div class="card mt-5">
		        <h2 class="card-header">Return Book</h2>
		        <div class="card-body">
	<form class="needs-validation" novalidate method="post" action="return-book.php"> 
		
		<div class="form-group col-md-6">
			<?= $MESSAGE; ?>
		</div>

		<div class="form-group col-md-6">
			<input type="text" class="form-control" placeholder="Student ID" name="rollno" required>
		</div>

		<div class="form-group col-md-6">
			<input type="text" class="form-control" placeholder="ISBN" name="ISBN" required>
		</div>

		<div class="form-group col-md-6">
			<input type="date" class="form-control" placeholder="Renew Date" name="r_date" required>
		</div>

		<div class="form-group col-md-6">
			<input type="submit" value="Return" class="btn btn-primary"></input>
		</div>

	</form>
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>