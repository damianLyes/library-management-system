<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['key'])){
	
	header('Location:page-403.html');
}
include 'header.php';
include('navbar.php');

$old_isbn = $_GET["edit"];
$select = "SELECT * FROM book WHERE ISBN='$old_isbn'";
$query = mysqli_query($conn, $select);
$fetch = mysqli_fetch_assoc($query);

$isbn = $fetch['ISBN'];
$title=$fetch['TITLE'];
$language=$fetch['LANGUAGE'];
$price=$fetch['MRP'];
$publisher=$fetch['PUBLISHER'];
$pub_date=$fetch['PUB_DATE'];
$quantity=$fetch['QUANTITY'];

$nisbn=$ntitle=$nlanguage=$nmrp=$npub_date=$nquantity=$npublisher="";
$message="";

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
//	if($isbn != $nisbn){
//		
//	}
	else{
//		$update = "UPDATE book 
	//	SET ISBN='$nisbn', TITLE='$ntitle', LANGUAGE='$nlanguage', PUBLISHER='$npublisher', MRP='$nmrp', PUB_DATE='$npub_date' QUANTITY='$nquantity' 
	//	WHERE ISBN='$old_isbn'";
		$isbn =$nisbn;
		$title=$ntitle;
		$language=$nlanguage;
		$price=$nmrp;
		$publisher=$npublisher;
		$pub_date=$npub_date;
		$quantity=$nquantity;

		$update = "UPDATE book SET ISBN='$isbn', TITLE='$title', LANGUAGE='$language', PUBLISHER='$publisher', MRP='$price', PUB_DATE='$pub_date',QUANTITY='$quantity' WHERE ISBN='$old_isbn'";
		$query2 = mysqli_query($conn, $update);
		$message = '<div class="alert alert-success" role="alert">Book Updated Successfully</div>';
		//echo "Successful!";
	}

	mysqli_close($conn);
}
?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12">
    		<div class="card mt-5">
				<?= $message; ?>
				<h2 class="card-header">Edit Book</h2>
		        <div class="card-body">
		        	<form class="needs-validation" method="post">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">ISBN</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="ISBN" value="<?php echo $isbn;  ?>" name="ISBN" required>
                                <div class="valid-feedback">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">TITLE</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="TITLE" value="<?php echo $title; ?>" name="TITLE" required>
                                <div class="valid-feedback">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">LANGUAGE</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="LANGUAGE" value="<?php echo $language; ?>" name="LANGUAGE" required>
                                <div class="valid-feedback">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">PRICE</label>
                                <input type="number" min="0" class="form-control" id="validationCustom01" value="<?php echo $price; ?>"placeholder="PRICE" name="MRP" required>
                                <div class="valid-feedback">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">PUBLISHER</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="PUBLISHER" value="<?php echo $publisher; ?>" name="PUBLISHER" required>
                                <div class="valid-feedback">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">DATE PUBLISHED</label>
                                <input type="date" class="form-control" id="validationCustom01" placeholder="DATE PUBLISHED" value="<?php echo  $pub_date?>" name="PUB_DATE" required>
                                <div class="valid-feedback">
                                   
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">QUANTITY</label>
                                <input type="number" min="0" class="form-control" id="validationCustom01" placeholder="QUANTITY" value="<?php echo $quantity; ?>" name="QUANTITY" required>
                                <div class="valid-feedback">
                                    
                                </div>
                            </div>
							<div class="col-md-4 mb-3" hidden>
                                <label for="validationCustom01">Old Isbn</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="OLD ISBN" value="<?php echo $old_isbn; ?>" name="old_isbn" required>
                                <div class="valid-feedback">
                                    
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
