<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "search_all"){
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
					$sql2 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC LIMIT 1";
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
}
else if($operation == "search_all_ongoing"){// For Ongoing Practice Training
	$sql1 = "SELECT id, id_no, process_final_initial, practice_training, process_under FROM practice_training_details WHERE status='Ongoing' ORDER BY id DESC";
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
					$sql3 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no2' ORDER BY id DESC LIMIT 1";
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
}
else if($operation == "search_all_passed"){// For Passed Practice Training
	$sql1 = "SELECT id, id_no, process_final_initial, practice_training, process_under FROM practice_training_details WHERE status='Passed' ORDER BY id DESC";
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
					$sql3 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no2' ORDER BY id DESC LIMIT 1";
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
}
else if($operation == "search_all_failed"){// For Failed Practice Training
	$sql1 = "SELECT id, id_no, process_final_initial, practice_training, process_under FROM practice_training_details WHERE status='Failed' ORDER BY id DESC";
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
					$sql3 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no2' ORDER BY id DESC LIMIT 1";
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
}
else if($operation == "search_key"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);	
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
					$sql2 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no' AND (id_no LIKE '%$keyword%' OR name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR position LIKE '%$keyword%' OR department LIKE '%$keyword%' OR process_final_initial LIKE '%$keyword%' OR practice_training LIKE '%$keyword%' OR 	process_under LIKE '%$keyword%') ORDER BY id DESC LIMIT 1";
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
									<td class="font-weight-bolder">'.$row2['process_final_initial'].'</td>
									<td class="font-weight-bolder">'.$row2['practice_training'].'</td>
									<td class="font-weight-bolder">'.$row2['process_under'].'</td>
								</tr>
							';
						}
					} else {
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
else if($operation == "search_key_ongoing"){ // For Searching All Ongoing Practice Training
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);	
	$sql1 = "SELECT id, id_no, process_final_initial, practice_training, process_under FROM practice_training_details WHERE status='Ongoing' AND (id_no LIKE '%$keyword%' OR process_final_initial LIKE '%$keyword%' OR practice_training LIKE '%$keyword%' OR process_under LIKE '%$keyword%') ORDER BY id DESC";
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
					$sql3 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no1' ORDER BY id DESC LIMIT 1";
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
									<td class="font-weight-bolder">'.$process_final_initial1.'</td>
									<td class="font-weight-bolder">'.$practice_training1.'</td>
									<td class="font-weight-bolder">'.$process_under1.'</td>
								</tr>
							';
						}
					} else {
					}
				}
			} else {
				echo "0 results";
			}
		}
	}
}
else if($operation == "search_key_passed"){ // For Searching All Passed Practice Training
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);	
	$sql1 = "SELECT id, id_no, process_final_initial, practice_training, process_under FROM practice_training_details WHERE status='Passed' AND (id_no LIKE '%$keyword%' OR process_final_initial LIKE '%$keyword%' OR practice_training LIKE '%$keyword%' OR process_under LIKE '%$keyword%') ORDER BY id DESC";
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
					$sql3 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no1' ORDER BY id DESC LIMIT 1";
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
									<td class="font-weight-bolder">'.$process_final_initial1.'</td>
									<td class="font-weight-bolder">'.$practice_training1.'</td>
									<td class="font-weight-bolder">'.$process_under1.'</td>
								</tr>
							';
						}
					} else {
					}
				}
			} else {
				echo "0 results";
			}
		}
	}
}
else if($operation == "search_key_failed"){ // For Searching All Failed Practice Training
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);	
	$sql1 = "SELECT id, id_no, process_final_initial, practice_training, process_under FROM practice_training_details WHERE status='Failed' AND (id_no LIKE '%$keyword%' OR process_final_initial LIKE '%$keyword%' OR practice_training LIKE '%$keyword%' OR process_under LIKE '%$keyword%') ORDER BY id DESC";
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
					$sql3 = "SELECT id, id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no1' ORDER BY id DESC LIMIT 1";
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
									<td class="font-weight-bolder">'.$process_final_initial1.'</td>
									<td class="font-weight-bolder">'.$practice_training1.'</td>
									<td class="font-weight-bolder">'.$process_under1.'</td>
								</tr>
							';
						}
					} else {
					}
				}
			} else {
				echo "0 results";
			}
		}
	}
}
else if($operation == "search_details_sus"){
$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);	
	$sql = "SELECT * FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo'
					<tr style="cursor: pointer;" class="text-black" onclick="open_on_large(&quot;'.$row['id_no'].'~!~'.$row['id'].'&quot;)">
						<td class="font-weight-bolder">'.$row['id_no'].'</td>
						<td class="font-weight-bolder">'.$row['name'].'</td>
						<td class="font-weight-bolder">'.$row['category'].'</td>
						<td class="font-weight-bolder">'.$row['position'].'</td>
						<td class="font-weight-bolder">'.$row['department'].'</td>
						<td class="font-weight-bolder">'.$row['car_model'].'</td>
						<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
						<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
						<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
						<td class="font-weight-bolder">'.$row['date_returned'].'</td>
						<td class="font-weight-bolder">'.$row['violation'].'</td>
						<td class="font-weight-bolder">'.$row['details'].'</td>
						<td class="font-weight-bolder">'.$row['remarks'].'</td>
					</tr>
				';
			}
		} else {
			echo "0 results";
		}
}
?>