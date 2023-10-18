<?php
require_once('connect.php');

$_SESSION['var']=0;
$ISBN="";
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
			mysqli_close($conn);
			header('Location:removeBook.php');
		}else{
			echo "Invalid ISBN!";
		}
	}else{
		echo "Enter a valid ISBN";
	}


}
?>
