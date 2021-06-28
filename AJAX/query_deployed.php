<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "add_employee"){
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$name = mysqli_real_escape_string($conn, $_GET['name']);
	$category = mysqli_real_escape_string($conn, $_GET['category']);
	$position = mysqli_real_escape_string($conn, $_GET['position']);
	$department = mysqli_real_escape_string($conn, $_GET['department']);
	$date_deployed = mysqli_real_escape_string($conn, $_GET['date_deployed']);
	$batch_no = mysqli_real_escape_string($conn, $_GET['batch_no']);
	$remarks = mysqli_real_escape_string($conn, $_GET['remarks']);
	//$name = str_replace('ñ', '&ntilde;', $name); 
	$sql = "INSERT INTO deployed_employee(id_no, batch_no, name, category, position, department,date_deployed,remarks)
	VALUES ('$id_no','$batch_no','$name','$category','$position','$department','$date_deployed','$remarks')";
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == "load_all"){
	$limiter = mysqli_real_escape_string($conn, $_GET['limiter']);
	$limiter = $limiter + 20;
	$sql = "SELECT id_no, name,category, position, department, batch_no, date_deployed, remarks  FROM deployed_employee ORDER BY id DESC LIMIT $limiter";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			/*$sql1 = "SELECT count(name) AS total FROM deployed_employee WHERE name = '".$row['name']."'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					$rowcount = $row1['total'];
					if($rowcount > 1){
						$stylee = 'style="cursor: pointer; background-color:rgb(255, 0, 0, 0.4);"';
					}else{
						$stylee = 'style="cursor: pointer;"';
					}
				}
			}*/
			echo'
				<tr class="text-black" onclick="open_on_modal(&quot;'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['date_deployed'].'~!~'.$row['batch_no'].'&quot;)">
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<td class="font-weight-bolder">'.$row['position'].'</td>
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['batch_no'].'</td>
					<td class="font-weight-bolder">'.$row['date_deployed'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
else if($operation == "search_employee"){
	$limiter = mysqli_real_escape_string($conn, $_GET['limiter']);
	$limiter = $limiter + 20;
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	if($keyword != ''){
		$sql = "SELECT * FROM deployed_employee WHERE id_no LIKE '%$keyword%' OR name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR position LIKE '%$keyword%' OR department LIKE '%$keyword%' OR date_deployed LIKE '%$keyword%' ORDER BY name ASC LIMIT $limiter";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
			$sql1 = "SELECT count(name) AS total FROM deployed_employee WHERE name = '".$row['name']."'";
			$result1 = $conn->query($sql1);
			/*if ($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					$rowcount = $row1['total'];
					if($rowcount > 1){
						$stylee = 'style="cursor: pointer; background-color:rgb(255, 0, 0, 0.4);"';
					}else{
						$stylee = 'style="cursor: pointer;"';
					}
				}
			}*/
			echo'
				<tr class="text-black" onclick="open_on_modal(&quot;'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['date_deployed'].'~!~'.$row['batch_no'].'&quot;)">
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<td class="font-weight-bolder">'.$row['position'].'</td>
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['batch_no'].'</td>
					<td class="font-weight-bolder">'.$row['date_deployed'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
		} else {
			echo "No Record Found for '".$keyword."'";
		}
	}else{
		$sql = "SELECT * FROM deployed_employee ORDER BY id DESC LIMIT $limiter";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
			/*$sql1 = "SELECT count(name) AS total FROM deployed_employee WHERE name = '".$row['name']."'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					$rowcount = $row1['total'];
					if($rowcount > 1){
						$stylee = 'style="cursor: pointer; background-color:rgb(255, 0, 0, 0.4);"';
					}else{
						$stylee = 'style="cursor: pointer;"';
					}
				}
			}*/
			echo'
				<tr class="text-black" onclick="open_on_modal(&quot;'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['date_deployed'].'~!~'.$row['batch_no'].'&quot;)">
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<td class="font-weight-bolder">'.$row['position'].'</td>
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['batch_no'].'</td>
					<td class="font-weight-bolder">'.$row['date_deployed'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
		} else {
			echo "No Record Found for '".$keyword."'";
		}
	}
}
else if($operation == "delete_employee"){
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$sql = "DELETE FROM deployed_employee WHERE id_no='$id_no'";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
else if($operation == "update_employee"){
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$name = mysqli_real_escape_string($conn, $_GET['name']);
	$category = mysqli_real_escape_string($conn, $_GET['category']);
	$position = mysqli_real_escape_string($conn, $_GET['position']);
	$department = mysqli_real_escape_string($conn, $_GET['department']);
	$date_deployed = mysqli_real_escape_string($conn, $_GET['date_deployed']);
	$batch_no = mysqli_real_escape_string($conn, $_GET['batch_no']);
	$remarks = mysqli_real_escape_string($conn, $_GET['remarks']);
	//$name = str_replace('ñ', '&ntilde;', $name); 
	$sql = "UPDATE deployed_employee SET batch_no='$batch_no', name='$name', category='$category', position='$position', department='$department', date_deployed='$date_deployed', remarks='$remarks' WHERE id_no='$id_no'";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}
else if($operation == "search_id_no_add"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	$sql = "SELECT id_no FROM deployed_employee WHERE id_no= '$keyword'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo'Not Availlable';
			}
		} else {
		}
}
?>