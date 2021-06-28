<?php
include '../../Connection/Connect.php';
$datenow = date('Y-m-d');
$filename = "Ongoing Practice Training".$datenow.".xls";
 //header("Content-Type: application/vnd.ms-excel");
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
$sql = "SELECT DISTINCT id_no FROM ir_memo ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id_no = $row['id_no'];
			$sql1 = "SELECT id_no, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC LIMIT 1 ";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					$id_no1 = $row1['id_no'];
					$process_final_initial = $row1['process_final_initial'];
					$practice_training = $row1['practice_training'];
					$process_under = $row1['process_under'];/* Nadagdag dito ang process_final_initial, practice_training at process_under*/
					$sql2 = "SELECT id_no FROM ir_memo WHERE id_no ='$id_no1' AND process_final_initial='$process_final_initial' AND practice_training='$practice_training' AND process_under='$process_under' ORDER BY id DESC";
					$result2 = $conn->query($sql2);
					if($result2->num_rows > 0){
						$rowcount=mysqli_num_rows($result2);
						if($rowcount > 1){							 
							$sql3 = "SELECT * FROM ir_memo WHERE id_no ='$id_no1' ORDER BY id DESC LIMIT 1";
							$result3 = $conn->query($sql3);
							if($result3->num_rows > 0){
								while($row3 = $result3->fetch_assoc()){
									$sql4 = "SELECT * FROM ir_memo WHERE id_no ='$id_no1' AND id='".$row3['id']."' ORDER BY id DESC";
									$result4 = $conn->query($sql4);
									if($result4->num_rows > 0){
										while($row4 = $result4->fetch_assoc()){
											echo'
												<tr class="text-black">
													<td class="font-weight-bolder">'.$row4['id_no'].'</td>
													<td class="font-weight-bolder">'.$row4['name'].'</td>
													<td class="font-weight-bolder">'.$row4['category'].'</td>
													<td class="font-weight-bolder">'.$row4['position'].'</td>
													<td class="font-weight-bolder">'.$row4['department'].'</td>
													<td class="font-weight-bolder">'.$row4['car_model'].'</td>
													<td class="font-weight-bolder">'.$row4['process_final_initial'].'</td>
													<td class="font-weight-bolder">'.$row4['practice_training'].'</td>
													<td class="font-weight-bolder">'.$row4['process_under'].'</td>
												</tr>'
											;
										}
									}
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