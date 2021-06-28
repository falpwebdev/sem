<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "get_all"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);	
	$sql = "SELECT * FROM scan_files WHERE id_files ='$keyword'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
				<div class="card col-sm-3 ml-0 mr-0">
					<div class="mx-md-n2">
						<img src="Images/pdf_background.jpg" class="img-fluid">
					</div>
					<span onclick="delete_uploaded_file(&quot;'.$row['id_files'].'~!~'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['location'].'&quot;)" class="rounded-circle default-color card-img-100 text-white" style="margin-top:-25px;margin-left:35%;width:50px;height:50px;cursor:pointer;"><i class="fas fa-trash fa-1x mt-3"></i></span>
					<div class="text-center">
						<label>'.$row['location'].'</label>
					</div>
				</div>
			';
		}
	} else {
		echo "0 results";
	}
}
else if($operation == "delete_one_file"){
	$id_files = mysqli_real_escape_string($conn, $_GET['id_files']);	
	$id = mysqli_real_escape_string($conn, $_GET['id']);	
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$location = mysqli_real_escape_string($conn, $_GET['location']);
	$new_location = '../Scanned_Files/'.$location.'';
	echo $new_location;
	unlink($new_location);
	$sql = "DELETE FROM scan_files WHERE id='$id' AND id_no='$id_no' AND id_files='$id_files'";
	if ($conn->query($sql) === TRUE){
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
?>
