<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['key'])){
	
	header('Location:page-403.html');
}
include 'header.php';
include('navbar.php');

$select = "SELECT * FROM book";
$query = mysqli_query($conn, $select);
$fetch = mysqli_fetch_assoc($query);

?>

<div class="main-content-inner">
<div class="row">
<div class="col-12">
            <div class="card mt-5">
                <div class="card-body table-responsive">
	
	<table class="table table-striped text-center">
	  <thead>
	    <tr>
	      <th scope="col">ISBN</th>
	      <th scope="col">Title</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
		<?php if (mysqli_num_rows($query)>0) {
				do{
		?>
		<tr>
			<td><?php echo $fetch['ISBN']; ?></td>
			<td><?php echo $fetch['TITLE']; ?></td>
			<td><a href="edit-book.php?edit=<?php echo $fetch['ISBN']; ?>">
				<button type="button" class="btn btn-success btn-sm" title="Edit Book">
					<i class="ti-pencil-alt"></i>
				</button></a>
				<a href="delbookdb.php?delete=<?php echo $fetch['ISBN']; ?>">
				<button type="button" class="btn btn-danger btn-sm" title="Delete Book">
					<i class="ti-trash"></i>
				</button></a>
			</td>
		</tr>
		<?php } while($fetch = mysqli_fetch_assoc($query));
			}
			//else{
			//	echo "0 Results";
			//}
			mysqli_close($conn);
		?> 
      </tbody>
	</table>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php');?>