<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['key'])){
	
	header('Location:page-403.html');
}

include 'header.php';
include('navbar.php');



		
		
		$ISBN=$TITLE=$LANGUAGE=$MRP=$PUB_DATE=$QUANTITY=$PUBLISHER="";

		$ISBN_ERR=$TITLE_ERR=$LANGUAGE_ERR=$MRP_ERR=$PUB_DATE_ERR=$QUANTITY_ERR=$PUBLISHER_ERR="";

		if($_SERVER["REQUEST_METHOD"]=="POST")
		{

			//ROLL NUMBER
			if(empty(trim($_POST["ISBN"])))
			{
				$ISBN_ERR = "Enter Book ISBN";
			}
			else
			{
				$ISBN=$_POST["ISBN"];
			}
			//TITLE
			if (empty(trim($_POST["TITLE"]))) 
			{
				$TITLE_ERR = "Enter TITLE of a Book";
			}
			else
			{
				$TITLE=trim($_POST["TITLE"]);
			}
			//LANGUAGE
			if (empty(trim($_POST["LANGUAGE"]))) 
			{
				$LANGUAGE_ERR = "Enter LANGUAGE of a Book";
			}
			else
			{
				$LANGUAGE=trim($_POST["LANGUAGE"]);
			}
			//PUBLISHER
			if (empty(trim($_POST["PUBLISHER"]))) 
			{
				$PUBLISHER_ERR = "Enter PUBLISHER of a Book";
			}
			else
			{
				$PUBLISHER=trim($_POST["PUBLISHER"]);
			}
			//MRP
			if (empty(trim($_POST["MRP"]))) 
			{
				$MRP_ERR= "Enter Price of Book";
			}
			else
			{
				$MRP=trim($_POST["MRP"]);
			}
			//PUB_DATE
			if (empty(trim($_POST["PUB_DATE"]))) 
			{
				$PUB_DATE_ERR= "Enter Published Date of Book";
			}
			else
			{
				$PUB_DATE=trim($_POST["PUB_DATE"]);
			}
			//QUANTITY
			if (empty(trim($_POST["QUANTITY"]))) 
			{
				$QUANTITY_ERR= "Please select quantity of book";
			}
			else
			{
				$QUANTITY=trim($_POST["QUANTITY"]);
			}
			
			if (empty($ISBN_ERR) &&empty($TITLE_ERR) &&empty($LANGUAGE_ERR)&&empty($MRP_ERR)&&empty($QUANTITY_ERR)&&empty($PUB_DATE_ERR)) 
			{
				$isbn_check_query = "SELECT * FROM book WHERE ISBN='$ISBN' LIMIT 1";
				$result = mysqli_query($conn, $isbn_check_query);
				$isbn = mysqli_fetch_assoc($result);

				if($result->num_rows === 1) { // if isbn exists
					$ISBN_ERR = '<div class="alert alert-danger" role="alert">ISBN Already Exist</div>';
					
				}else{
					$query1="INSERT INTO book(ISBN,TITLE,LANGUAGE,PUBLISHER,MRP,PUB_DATE,QUANTITY)VALUES($ISBN,'$TITLE','$LANGUAGE','$PUBLISHER',$MRP,'$PUB_DATE',$QUANTITY)";
					mysqli_query($conn,$query1);
					$ISBN_ERR = '<div class="alert alert-success" role="alert">Book Added Successfully</div>';
					
				}
			}
			mysqli_close($conn);
		}



?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12">
    		<div class="card mt-5">
				<?= $ISBN_ERR; ?>
                <h2 class="card-header">Add Book</h2>
		        <div class="card-body">
		        	<form class="needs-validation" novalidate action="addBook.php" method="post">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">ISBN</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="ISBN" name="ISBN" required>
                                <div class="valid-feedback">
                                    <?php// echo $ISBN_ERR; ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">TITLE</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="TITLE" name="TITLE" required>
                                <div class="valid-feedback">
                                    <?php echo $TITLE_ERR; ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">LANGUAGE</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="LANGUAGE" name="LANGUAGE" required>
                                <div class="valid-feedback">
                                    <?php echo $LANGUAGE_ERR; ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">PRICE</label>
                                <input type="number" min="0" class="form-control" id="validationCustom01" placeholder="PRICE" name="MRP" required>
                                <div class="valid-feedback">
                                    <?php echo $MRP_ERR; ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">PUBLISHER</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="PUBLISHER" name="PUBLISHER" required>
                                <div class="valid-feedback">
                                    <?php echo $PUBLISHER_ERR; ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">DATE PUBLISHED</label>
                                <input type="date" class="form-control" id="validationCustom01" placeholder="DATE PUBLISHED" name="PUB_DATE" required>
                                <div class="valid-feedback">
                                    <?php echo $PUB_DATE_ERR; ?>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">QUANTITY</label>
                                <input type="number" min="0" class="form-control" id="validationCustom01" placeholder="QUANTITY" name="QUANTITY" required>
                                <div class="valid-feedback">
                                    <?php echo $QUANTITY_ERR; ?>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
