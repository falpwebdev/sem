<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == 'save'){
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$process_dropdown_new = mysqli_real_escape_string($conn, $_GET['process_dropdown']);
	$pt_section_select_new = mysqli_real_escape_string($conn, $_GET['pt_section_select']);
	$process_under_new = mysqli_real_escape_string($conn, $_GET['process_under']);
	$date_of_training_new = mysqli_real_escape_string($conn, $_GET['date_of_training']);
	$name_trainor = mysqli_real_escape_string($conn, $_GET['name_trainor']);
	$sql = "SELECT process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no = '$id_no' AND  process_final_initial = process_final_initial AND practice_training = practice_training AND process_under = process_under LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$process_final_initial = $row['process_final_initial'];
			$practice_training = $row['practice_training'];
			$process_under = $row['process_under'];
			$sql1 = "INSERT INTO practice_training_details (id_no, process_final_initial, practice_training, process_under, trainor, date_training, result, remarks, status)
			VALUES ('$id_no', '$process_dropdown_new', '$pt_section_select_new', '$process_under_new', '$name_trainor', '$date_of_training_new', '', '', 'Ongoing')";
			if ($conn->query($sql1) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql1 . "<br>" . $conn->error;
			}
			$sql2 = "DELETE FROM cc_or_refresh WHERE id_no='$id_no'";
			if ($conn->query($sql2) === TRUE) {
				//echo "Record deleted successfully";
			}else{
				echo "Error deleting record: " . $conn->error;
			}
		}
	}else{
		echo "Error on updating records";
	}
}
else if($operation == 'update_result'){
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$pt_section_result = mysqli_real_escape_string($conn, $_GET['pt_section_result']);
	$name_trainor = mysqli_real_escape_string($conn, $_GET['name_trainor']);
	$date_completed = mysqli_real_escape_string($conn, $_GET['date_completed']);
	$sql = "UPDATE practice_training_details SET trainor='$name_trainor', date_completed='$date_completed', result='$pt_section_result', status='$pt_section_result' WHERE id='$id' AND id_no='$id_no'";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
?>