<?php
include '../../Connection/Connect.php';
$datenow = date('Y-m-d');
$filename = "Incomplete in Refresh Training".$datenow.".xls";
// header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv; charset=utf-8');  
header("Content-Disposition: ; filename=\"$filename\"");
echo'
<html lang="en">
<body>
<table border="1">
<thead>
	<tr>
		<td>ID No.</td>
		<td>Name</td>
		<td>Category</td>
		<td>Position</td>
		<td>Department</td>
		<td>Car Model</td>
		<td>Process</td>
		<td>Practice Training</td>
		<td>Specific Process</td>
	</tr>
</thead>
';
$sql1 = "SELECT id, id_no, process_final_initial, practice_training, process_under FROM refresh_training_details WHERE status='Incomplete' ORDER BY id DESC";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0){
		while($row1 = $result1->fetch_assoc()){
			$id1 = $row1['id'];
			$id_no1 = $row1['id_no'];
			$process_final_initial1 = $row1['process_final_initial'];
			$practice_training1 = $row1['practice_training'];
			$process_under1 = $row1['process_under'];
			$sql2 = "SELECT id_no FROM ir_memo WHERE id_no ='$id_no1' ORDER BY id DESC LIMIT 1 ";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0){
				while($row2 = $result2->fetch_assoc()){
					$id_no2 = $row2['id_no'];
					$sql3 = "SELECT id, id_no, name, category, position, department, car_model, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no2' ORDER BY id DESC LIMIT 1";
					$result3 = $conn->query($sql3);
					if ($result3->num_rows > 0){
						while($row3 = $result3->fetch_assoc()){
							echo'
								<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row3['id_no'].'~!~'.$id1.'&quot;)">
									<td class="font-weight-bolder">'.$row3['id_no'].'</td>
									<td class="font-weight-bolder">'.$row3['name'].'</td>
									<td class="font-weight-bolder">'.$row3['category'].'</td>
									<td class="font-weight-bolder">'.$row3['position'].'</td>
									<td class="font-weight-bolder">'.$row3['department'].'</td>
									<td class="font-weight-bolder">'.$row3['car_model'].'</td>
									<td class="font-weight-bolder">'.$process_final_initial1.'</td>
									<td class="font-weight-bolder">'.$practice_training1.'</td>
									<td class="font-weight-bolder">'.$process_under1.'</td>
								</tr>
							';
						}
					} else {
						echo "0 results";
					}
				}
			} else {
				echo "0 results";
			}
		}
	}
echo'
</table>
</body>
</html>
';
?>