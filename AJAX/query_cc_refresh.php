<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == 'save'){
	$id_no_cc = mysqli_real_escape_string($conn, $_GET['id_no_cc']);
	$cc_or_refresh = mysqli_real_escape_string($conn, $_GET['cc_or_refresh']);
	$certificate = mysqli_real_escape_string($conn, $_GET['certificate']);
	$process_final_initial = mysqli_real_escape_string($conn, $_GET['process_final_initial']);
	$practice_training = mysqli_real_escape_string($conn, $_GET['practice_training']);
	$process_under = mysqli_real_escape_string($conn, $_GET['process_under']);
	$date_issued = mysqli_real_escape_string($conn, $_GET['date_issued']);
	$sql = "INSERT INTO cc_or_refresh(id_no, process_final_initial, practice_training, process_under, status)
	VALUES ('$id_no_cc','$process_final_initial','$practice_training','$process_under','$cc_or_refresh')";
	if($conn->query($sql) === TRUE){
		$sql1 = "INSERT INTO cc_certification(id_no, process_final_initial, practice_training, process_under, certificate_no, date_issued)
		VALUES ('$id_no_cc','$process_final_initial','$practice_training','$process_under','$certificate','$date_issued')";
		if($conn->query($sql1) === TRUE){
			echo "Record Updated!!!";
		}else{
		echo "Error: " . $sql1 . "<br>" . $conn->error;			
		}
		/*$sql1 = "SELECT * FROM ir_memo WHERE id_no ='$id_no_cc'";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()){
				
			}
		} else {
			echo "0 results";
		}*/
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == 'certification'){
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$process_final_initial = mysqli_real_escape_string($conn, $_GET['process_final_initial']);
	$practice_training = mysqli_real_escape_string($conn, $_GET['practice_training']);
	$process_under = mysqli_real_escape_string($conn, $_GET['process_under']);
	
	$sql = "SELECT * FROM cc_certification WHERE id_no='$id_no' AND  process_final_initial='$process_final_initial' AND practice_training='$practice_training' AND process_under='$process_under' ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sql1 = "SELECT * FROM cc_or_refresh WHERE id_no='$id_no' AND  process_final_initial='$process_final_initial' AND practice_training='$practice_training' AND process_under='$process_under' ORDER BY id DESC LIMIT 1";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){	
					echo $row['certificate_no'].'~!~'.$row['date_issued'].'~!~'.$row1['status'];
				}
			}
		}
	}
}
?>