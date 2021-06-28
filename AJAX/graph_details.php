<?php
include '../Connection/Connect.php';
$filter = mysqli_real_escape_string($conn, $_GET['filter']);
if($filter == "Category"){
	$date_from = mysqli_real_escape_string($conn, $_GET['date_from']);
	$date_to = mysqli_real_escape_string($conn, $_GET['date_to']);
	$sql = "SELECT * FROM category ORDER BY Name_Category ASC";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo $row['Name_Category'].',';
		}
	}
		echo'~!~,';
	$sql1 = "SELECT * FROM category ORDER BY Name_Category ASC";
	$result1 = $conn->query($sql1);
	if($result1->num_rows > 0){
		while($row1 = $result1->fetch_assoc()){
			$sql2 = "SELECT COUNT(category) AS total FROM ir_memo WHERE category='".$row1['Name_Category']."' AND (date_suspended_from >='$date_from' AND date_suspended_from <='$date_to')";
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0){
				while($row2 = $result2->fetch_assoc()){
					echo $row2['total'].',';
				}
			}
		}
	}
	echo'~!~,';
}else if($filter == 'Car Model'){
	$date_from = mysqli_real_escape_string($conn, $_GET['date_from']);
	$date_to = mysqli_real_escape_string($conn, $_GET['date_to']);
	$sql = "SELECT * FROM car_model ORDER BY Car_Model_Name ASC";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo $row['Car_Model_Name'].',';
		}
	}
		echo'~!~,';
	$sql1 = "SELECT * FROM car_model ORDER BY Car_Model_Name ASC";
	$result1 = $conn->query($sql1);
	if($result1->num_rows > 0){
		while($row1 = $result1->fetch_assoc()){
			$sql2 = "SELECT COUNT(car_model) AS total FROM ir_memo WHERE car_model='".$row1['Car_Model_Name']."' AND (date_suspended_from >='$date_from' AND date_suspended_from <='$date_to')";
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0){
				while($row2 = $result2->fetch_assoc()){
					echo $row2['total'].',';
				}
			}
		}
	}
	echo'~!~,';
}
?>