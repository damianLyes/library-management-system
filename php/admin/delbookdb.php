<?php
require_once('connect.php');
//
$delete = $_GET["delete"];
$sql = "DELETE FROM book WHERE ISBN=$delete";


if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);