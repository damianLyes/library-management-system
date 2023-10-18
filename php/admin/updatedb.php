<?php
require_once('connect.php');

$nisbn=$ntitle=$nlanguage=$nmrp=$npub_date=$nquantity=$npublisher="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
	$nisbn = $_POST['ISBN'];
	$ntitle = $_POST['TITLE'];
	$nlanguage = $_POST['LANGUAGE'];
	$nmrp=$_POST['MRP'];
	$npub_date=$_POST['PUB_DATE'];
	$nquantity=$_POST['QUANTITY'];
	$npublisher=$_POST['PUBLISHER'];
	$old_isbn=$_POST['old_isbn'];
	
	if(empty($nisbn) || empty($ntitle) || empty($nlanguage) || empty($nmrp) || empty($npub_date) || empty($nquantity) || empty($npublisher)){
		$err_message = "Field Cannot be Empty!";
	}
	else{
		$update = "UPDATE book SET ISBN='$nisbn', TITLE='$ntitle', LANGUAGE='$nlanguage', PUBLISHER='$npublisher', MRP='$nmrp', PUB_DATE='$npub_date' QUANTITY='$nquantity' WHERE ISBN='$old_isbn'";
		$query = mysqli_query($conn, $update);
		//header("location:books.php");
		echo "Successful!";
	}

	mysqli_close($conn);
}
?>