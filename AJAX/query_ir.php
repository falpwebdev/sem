<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
$name = mysqli_real_escape_string($conn, $_GET['name']);
$category = mysqli_real_escape_string($conn, $_GET['category']);
$position = mysqli_real_escape_string($conn, $_GET['position']);
$department = mysqli_real_escape_string($conn, $_GET['department']);
$car_model = mysqli_real_escape_string($conn, $_GET['car_model']);
$no_of_days = mysqli_real_escape_string($conn, $_GET['no_of_days']);
$date_suspended_from = mysqli_real_escape_string($conn, $_GET['date_suspended_from']);
$date_suspended_to = mysqli_real_escape_string($conn, $_GET['date_suspended_to']);
$date_returned = mysqli_real_escape_string($conn, $_GET['date_returned']);
$violation = mysqli_real_escape_string($conn, $_GET['violation']);
$other_details = mysqli_real_escape_string($conn, $_GET['other_details']);
$details = mysqli_real_escape_string($conn, $_GET['details']);
$process_final_initial = mysqli_real_escape_string($conn, $_GET['process_final_initial']);
$practice_training = mysqli_real_escape_string($conn, $_GET['practice_training']);
$process_final_initial = mysqli_real_escape_string($conn, $_GET['process_final_initial']);
$process_under = mysqli_real_escape_string($conn, $_GET['process_under']);
$date_report_to_tc = mysqli_real_escape_string($conn, $_GET['date_report_to_tc']);
$remarks = mysqli_real_escape_string($conn, $_GET['remarks']);
$id_uploaded_file = mysqli_real_escape_string($conn, $_GET['id_uploaded_file']);
$car_model_line = mysqli_real_escape_string($conn, $_GET['car_model_line']);
//$name = str_replace('ñ', '&ntilde;', $name); 
if($violation == "SOP"){
	$violation = "SOP";
}else if($violation == "Others"){
	$violation = $other_details;
}
if($operation == "add_ir"){
	$sql = "INSERT INTO ir_memo(id_no, name, category, position, department, car_model, line, no_of_days, date_suspended_from, date_suspended_to, date_returned, violation, details, process_final_initial, practice_training, process_under, date_report_tc, cancelation_of_certificate, ir_copy, remarks)
	VALUES ('$id_no','$name','$category','$position','$department','$car_model','$car_model_line','$no_of_days','$date_suspended_from','$date_suspended_to','$date_returned','$violation','$details','$process_final_initial','$practice_training','$process_under','$date_report_to_tc','','$id_uploaded_file','$remarks')";
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == 'update_ir'){
	$id_hidden = mysqli_real_escape_string($conn, $_GET['id_hidden']);
	$sql = "UPDATE ir_memo SET name='$name', category='$category', position='$position', department='$department', car_model='$car_model', line='$car_model_line', no_of_days='$no_of_days', date_suspended_from='$date_suspended_from', date_suspended_to='$date_suspended_to', date_returned='$date_returned', violation='$violation', details='$details', process_final_initial='$process_final_initial', practice_training='$practice_training', process_under='$process_under', date_report_tc='$date_report_to_tc', cancelation_of_certificate='', ir_copy='$id_uploaded_file', remarks='$remarks' WHERE id='$id_hidden' AND id_no='$id_no'";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
?>