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
$ISBN_MESSAGE ="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$ISBN=$_POST["ISBN"];
	if (!empty($ISBN)) 
	{
		$isbn_check_query = "SELECT * FROM book WHERE ISBN='$ISBN' LIMIT 1";
		$result = mysqli_query($conn, $isbn_check_query);
		$isbn = mysqli_fetch_assoc($result);
		if($result->num_rows === 1) { // if isbn exists
			$sql="DELETE FROM book WHERE ISBN = '$ISBN'";
			$result=mysqli_query($conn, $sql);
			$ISBN_MESSAGE = '<div class="alert alert-success" role="alert">Book Deleted Successfully</div>';

			//header('Location:removeBook.php');
		}else{
		$ISBN_MESSAGE = '<div class="alert alert-danger" role="alert">Invalid ISBN</div>';

		}
	}else{
		$ISBN_MESSAGE = '<div class="alert alert-danger" role="alert">Enter ISBN</div>';

	}


}

mysqli_close($conn);

?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12">
    		<div class="card mt-5">
    			<h2 class="card-header">Remove Book</h2>
		        <div class="card-body">
	<form  class="needs-validation" novalidate method="post" action="removeBook.php"> 
		
		<div class="form-group col-md-6">
			<?= $ISBN_MESSAGE; ?>
		</div>

		<div class="form-group col-md-6">
			<input type="text" class="form-control" placeholder="ISBN" name="ISBN" required>
		</div>

		<div class="form-group col-md-6">
			<input type="submit" value="Remove" class="btn btn-primary"></input>
		</div>
	</form>
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>