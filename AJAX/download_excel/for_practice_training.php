<?php
include '../../Connection/Connect.php';
$datenow = date('Y-m-d');
$filename = "For Practice Training".$datenow.".xls";
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
$sql = "SELECT * FROM cc_or_refresh WHERE status = 'Practice Training' ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id_no = $row['id_no'];
			$sql1 = "SELECT id_no FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC LIMIT 1 ";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					$id_no1 = $row1['id_no'];
					$sql2 = "SELECT id, id_no, name, category, position, department, car_model, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC LIMIT 1";
					$result2 = $conn->query($sql2);
					if ($result2->num_rows > 0){
						while($row2 = $result2->fetch_assoc()){
							echo'
								<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row2['id_no'].'&quot;)">
									<td class="font-weight-bolder">'.$row2['id_no'].'</td>
									<td class="font-weight-bolder">'.$row2['name'].'</td>
									<td class="font-weight-bolder">'.$row2['category'].'</td>
									<td class="font-weight-bolder">'.$row2['position'].'</td>
									<td class="font-weight-bolder">'.$row2['department'].'</td>
									<td class="font-weight-bolder">'.$row2['car_model'].'</td>
									<td class="font-weight-bolder">'.$row2['process_final_initial'].'</td>
									<td class="font-weight-bolder">'.$row2['practice_training'].'</td>
									<td class="font-weight-bolder">'.$row2['process_under'].'</td>
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
	} else {
		echo "0 results";
	}
echo'
</table>
</body>
</html>
';
?>