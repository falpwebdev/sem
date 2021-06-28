<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
$id = mysqli_real_escape_string($conn, $_GET['id']);
if($operation == 'get_result_trainor'){
	$sql = "SELECT status, trainor FROM practice_training_details WHERE id_no='$id_no'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo $row['status'].'~!~'.$row['trainor'];
		}
	} else {
		echo "0 results";
	}
}