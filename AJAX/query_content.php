<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == 'update_category'){
	$id_category = mysqli_real_escape_string($conn, $_GET['id_category']);
	$name_category = mysqli_real_escape_string($conn, $_GET['name_category']);
	$sql = "UPDATE category SET Name_Category='$name_category' WHERE id = '$id_category'";
	if ($conn->query($sql) === TRUE){
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
else if($operation == 'update_position'){
	$id_position = mysqli_real_escape_string($conn, $_GET['id_position']);
	$name_position = mysqli_real_escape_string($conn, $_GET['name_position']);
	$sql = "UPDATE position SET Name_Position='$name_position' WHERE id = '$id_position'";
	if ($conn->query($sql) === TRUE){
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
else if($operation == 'update_department'){
	$id_department = mysqli_real_escape_string($conn, $_GET['id_department']);
	$name_department = mysqli_real_escape_string($conn, $_GET['name_department']);
	$sql = "UPDATE department SET Name_Department='$name_department' WHERE id = '$id_department'";
	if ($conn->query($sql) === TRUE){
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
else if($operation == 'update_process'){
	$id_process = mysqli_real_escape_string($conn, $_GET['id_process']);
	$name_process = mysqli_real_escape_string($conn, $_GET['name_process']);
	$sql = "UPDATE process SET Name_Process='$name_process' WHERE id = '$id_process'";
	if ($conn->query($sql) === TRUE){
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
else if($operation == 'save_category'){
	$name_category = mysqli_real_escape_string($conn, $_GET['name_category']);
	$sql = "INSERT INTO category (Name_Category)
	VALUES ('$name_category')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == 'save_position'){
	$name_position = mysqli_real_escape_string($conn, $_GET['name_position']);
	$sql = "INSERT INTO position (Name_Position)
	VALUES ('$name_position')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == 'save_department'){
	$name_department = mysqli_real_escape_string($conn, $_GET['name_department']);
	$sql = "INSERT INTO department (Name_Department)
	VALUES ('$name_department')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == 'save_process'){
	$name_process = mysqli_real_escape_string($conn, $_GET['name_process']);
	$process_final_initial = mysqli_real_escape_string($conn, $_GET['process_final_initial']);
	$practice_training = mysqli_real_escape_string($conn, $_GET['practice_training']);
	if($process_final_initial == "Initial Process"){
		$table = "initial_process";
	}else if($process_final_initial == "Final Process"){
		$table = "final_process";
	}
	$sql = "INSERT INTO $table (Name_Process, Under_Of)
	VALUES ('$name_process', '$practice_training')";
	if ($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == 'delete_category'){
	$id_category = mysqli_real_escape_string($conn, $_GET['id_category']);
	$sql = "DELETE FROM category WHERE id='$id_category'";
	if ($conn->query($sql) === TRUE){
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

}
else if($operation == 'delete_position'){
	$id_position = mysqli_real_escape_string($conn, $_GET['id_position']);
	$sql = "DELETE FROM position WHERE id='$id_position'";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
else if($operation == 'delete_department'){
	$id_department = mysqli_real_escape_string($conn, $_GET['id_department']);
	$sql = "DELETE FROM department WHERE id='$id_department'";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
else if($operation == 'delete_process'){
	$id_process = mysqli_real_escape_string($conn, $_GET['id_process']);
	$sql = "DELETE FROM process WHERE id='$id_process'";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
?>