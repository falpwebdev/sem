<?php
$operation = $_GET['operation'];
include '../Connection/Connect.php';
if($operation == 'category'){
	$sql = "SELECT Name_Category FROM category";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_Category'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'position'){
	$sql = "SELECT Name_Position FROM position";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_Position'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'department'){
	$sql = "SELECT Name_Department FROM department";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_Department'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'process'){
	$sql = "SELECT Name_Process FROM process";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_Process'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'car_model'){
	$sql = "SELECT Car_Model_Name FROM car_model";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Car_Model_Name'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'car_model_line'){
	$sql = "SELECT line FROM car_model_line";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'<option>'.$row['line'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'line_specific'){
	$keyword = $_GET['keyword'];
	$sql = "SELECT line FROM car_model_line WHERE car_model='$keyword'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'<option>'.$row['line'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'initial'){
	$sql = "SELECT Name_Process FROM initial_process";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_Process'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'final'){
	$sql = "SELECT Name_Process FROM final_process";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_Process'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'initial_pt'){
	$sql = "SELECT Name_PT FROM initial_pt";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_PT'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'final_pt'){
	$sql = "SELECT Name_PT FROM final_pt";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_PT'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'get_under_of_initial'){
	$under_of = mysqli_real_escape_string($conn, $_GET['under_of']);
	$sql = "SELECT Name_Process FROM initial_process WHERE Under_OF='$under_of'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'<option>'.$row['Name_Process'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'get_under_of_final'){
	$under_of = mysqli_real_escape_string($conn, $_GET['under_of']);
	$sql = "SELECT Name_Process FROM final_process WHERE Under_OF='$under_of'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'<option>'.$row['Name_Process'].'</option>';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
?>