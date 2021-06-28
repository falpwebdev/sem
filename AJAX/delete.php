<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
$id_hidden = mysqli_real_escape_string($conn, $_GET['id_hidden']);
if($operation == 'delete_ir'){
	$sql = "DELETE FROM ir_memo WHERE id='$id_hidden' AND id_no='$id_no'";
	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
}
?>
