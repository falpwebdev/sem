<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
$ir_copy = mysqli_real_escape_string($conn, $_GET['ir_copy']);
$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
if($operation == "ir_copy_cancellation"){
	$sql = "SELECT * FROM scan_files WHERE id_no ='$id_no' AND id_files='$ir_copy'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
			<label><a href="Scanned_Files/'.$row['location'].'" target="_blank"><i class="fas fa-file-pdf fa-4x" title="Click Here to View Attached File" style="cursor: pointer;"></i></a><br>'.$row['location'].'</label><br>
			';
		}
	}
}
if($operation == "ir_copy_ir_add"){
	$sql = "SELECT * FROM scan_files WHERE id_no ='$id_no' AND id_files='$ir_copy'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
			<label class="text-wrap col-sm-3"><a href="Scanned_Files/'.$row['location'].'" target="_blank"><i class="fas fa-file-pdf fa-3x" title="Click Here to View Attached File" style="cursor: pointer;"></i></a><br>'.$row['location'].'</label>
			';
		}
	}
}
?>