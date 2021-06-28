<?php
$operation = $_GET['operation'];
include '../Connection/Connect.php';
if($operation == 'category'){
	$sql = "SELECT id,Name_Category FROM category";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo'
			<tr style="cursor:pointer;" onclick="get_this(&quot;'.$row['id'].'~!~'.$row['Name_Category'].'~!~category&quot;)">
				<td class="font-weight-bolder">'.$row['id'].'</td>
				<td class="font-weight-bolder">'.$row['Name_Category'].'</td>
			</tr>
			';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'position'){
	$sql = "SELECT id,Name_Position FROM position";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
			<tr style="cursor:pointer;" onclick="get_this(&quot;'.$row['id'].'~!~'.$row['Name_Position'].'~!~position&quot;)">
				<td class="font-weight-bolder">'.$row['id'].'</td>
				<td class="font-weight-bolder">'.$row['Name_Position'].'</td>
			</tr>
			';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'department'){
	$sql = "SELECT id,Name_Department FROM department";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
			<tr style="cursor:pointer;" onclick="get_this(&quot;'.$row['id'].'~!~'.$row['Name_Department'].'~!~department&quot;)">
				<td class="font-weight-bolder">'.$row['id'].'</td>
				<td class="font-weight-bolder">'.$row['Name_Department'].'</td>
			</tr>
			';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'process'){
	$pt = $_GET['pt'];
	if($pt == "Initial Process"){
		$table = "initial_pt";
	}else if($pt == "Final Process"){
		$table = "final_pt";
	}
	$sql = "SELECT id, Name_PT FROM $table";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
			<tr style="cursor:pointer;" onclick="get_content_for_specific(&quot;'.$pt.'~!~'.$row['Name_PT'].'&quot;)">
				<td class="font-weight-bolder">'.$row['id'].'</td>
				<td class="font-weight-bolder">'.$row['Name_PT'].'</td>
			</tr>
			';
		}
	} else {
		echo "0 result please contact the it department";
	}
}
else if($operation == 'process_all_by_pt'){
	$pt = $_GET['pt'];
	$p = $_GET['p'];
	if($p == "Initial Process"){
		$table = "initial_process";
	}else if($p == "Final Process"){
		$table = "final_process";
	}
	$sql = "SELECT id, Name_Process FROM $table WHERE Under_of='$pt'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
			<tr style="cursor:pointer;">
				<td class="font-weight-bolder">'.$row['Name_Process'].'</td>
			</tr>
			';
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
?>