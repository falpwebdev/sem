<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "search_all"){
	$sql = "SELECT DISTINCT id_no FROM ir_memo ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id_no = $row['id_no'];
			$sql1 = "SELECT DISTINCT id_no, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					$id_no1 = $row1['id_no'];
					$process_final_initial = $row1['process_final_initial'];
					$practice_training = $row1['practice_training'];
					$process_under = $row1['process_under'];/* Nadagdag dito ang process_final_initial, practice_training at process_under*/
					//echo $id_no1;
					$sql2 = "SELECT id_no FROM ir_memo WHERE id_no ='$id_no1' AND process_final_initial='$process_final_initial' AND practice_training='$practice_training' AND process_under='$process_under' ORDER BY id DESC";
					$result2 = $conn->query($sql2);
					if($result2->num_rows > 0){
						$rowcount=mysqli_num_rows($result2);
						if($rowcount > 1){	
							$sql5 = "SELECT id_no FROM ir_memo WHERE id_no ='$id_no1'";
							$result5 = $conn->query($sql5);
							if($result5->num_rows > 0){
								$rowcount1=mysqli_num_rows($result5);
							}
							$sql3 = "SELECT * FROM ir_memo WHERE id_no ='$id_no1' ORDER BY id DESC LIMIT 1";
							$result3 = $conn->query($sql3);
							if($result3->num_rows > 0){
								while($row3 = $result3->fetch_assoc()){
									$sql4 = "SELECT id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no1' AND id='".$row3['id']."' ORDER BY id DESC";
									$result4 = $conn->query($sql4);
									if($result4->num_rows > 0){
										while($row4 = $result4->fetch_assoc()){
											$sql5 = "SELECT certificate_no, date_issued FROM cc_certification WHERE id_no ='$id_no1' AND process_final_initial='".$row4['process_final_initial']."' AND practice_training='".$row4['practice_training']."' AND process_under='".$row4['process_under']."' ORDER BY id DESC LIMIT 1";
											$result5 = $conn->query($sql5);
											if($result5->num_rows > 0){
												while($row5 = $result5->fetch_assoc()){
													echo'
														<tr style="cursor: pointer;" class="text-black" onclick="open_details_cc(&quot;'.$row4['id_no'].'~!~'.$row4['process_final_initial'].'~!~'.$row4['practice_training'].'~!~'.$row4['process_under'].'&quot;)">
															<td class="font-weight-bolder">'.$row4['id_no'].'</td>
															<td class="font-weight-bolder">'.$row4['name'].'</td>
															<td class="font-weight-bolder">'.$row4['category'].'</td>
															<td class="font-weight-bolder">'.$row4['position'].'</td>
															<td class="font-weight-bolder">'.$row4['department'].'</td>
															<td class="font-weight-bolder">'.$row4['process_under'].'</td>
															<td class="font-weight-bolder">'.$row5['certificate_no'].'</td>
															<td class="font-weight-bolder">'.$row5['date_issued'].'</td>
															<td class="font-weight-bolder">'.$rowcount.'</td>
															<td class="font-weight-bolder">'.$rowcount1.'</td>
														</tr>'
													;
												}
											}else{
												echo'
														<tr style="cursor: pointer;" class="text-black" onclick="open_details_cc(&quot;'.$row4['id_no'].'~!~'.$row4['process_final_initial'].'~!~'.$row4['practice_training'].'~!~'.$row4['process_under'].'&quot;)">
															<td class="font-weight-bolder">'.$row4['id_no'].'</td>
															<td class="font-weight-bolder">'.$row4['name'].'</td>
															<td class="font-weight-bolder">'.$row4['category'].'</td>
															<td class="font-weight-bolder">'.$row4['position'].'</td>
															<td class="font-weight-bolder">'.$row4['department'].'</td>
															<td class="font-weight-bolder">'.$row4['process_under'].'</td>
															<td class="font-weight-bolder"></td>
															<td class="font-weight-bolder"></td>
															<td class="font-weight-bolder">'.$rowcount.'</td>
															<td class="font-weight-bolder">'.$rowcount1.'</td>
														</tr>'
													;
											}
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
}
else if($operation == "search_cc"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	$sql = "SELECT DISTINCT id_no FROM ir_memo ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$id_no = $row['id_no'];
			$sql1 = "SELECT DISTINCT id_no, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC";
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
							$sql5 = "SELECT id_no FROM ir_memo WHERE id_no ='$id_no1'";
							$result5 = $conn->query($sql5);
							if($result5->num_rows > 0){
								$rowcount1=mysqli_num_rows($result5);
							}
							$sql3 = "SELECT * FROM ir_memo WHERE id_no ='$id_no1' ORDER BY id DESC LIMIT 1";
							$result3 = $conn->query($sql3);
							if($result3->num_rows > 0){
								while($row3 = $result3->fetch_assoc()){
									$sql4 = "SELECT id_no, name, category, position, department, process_final_initial, practice_training, process_under FROM ir_memo WHERE id_no ='$id_no1' AND id='".$row3['id']."' AND (id_no LIKE '%$keyword%' OR name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR position LIKE '%$keyword%' OR department LIKE '%$keyword%' OR process_final_initial LIKE '%$keyword%' OR practice_training LIKE '%$keyword%' OR 	process_under LIKE '%$keyword%') ORDER BY id DESC";
									$result4 = $conn->query($sql4);
									if($result4->num_rows > 0){
										while($row4 = $result4->fetch_assoc()){
											$sql5 = "SELECT certificate_no, date_issued FROM cc_certification WHERE id_no ='$id_no1' AND process_final_initial='".$row4['process_final_initial']."' AND practice_training='".$row4['practice_training']."' AND process_under='".$row4['process_under']."' ORDER BY id DESC";
											$result5 = $conn->query($sql5);
											if($result5->num_rows > 0){
												while($row5 = $result5->fetch_assoc()){
													echo'
														<tr style="cursor: pointer;" class="text-black" onclick="open_details_cc(&quot;'.$row4['id_no'].'~!~'.$row4['process_final_initial'].'~!~'.$row4['practice_training'].'~!~'.$row4['process_under'].'&quot;)">
															<td class="font-weight-bolder">'.$row4['id_no'].'</td>
															<td class="font-weight-bolder">'.$row4['name'].'</td>
															<td class="font-weight-bolder">'.$row4['category'].'</td>
															<td class="font-weight-bolder">'.$row4['position'].'</td>
															<td class="font-weight-bolder">'.$row4['department'].'</td>
															<td class="font-weight-bolder">'.$row4['process_under'].'</td>
															<td class="font-weight-bolder">'.$row5['certificate_no'].'</td>
															<td class="font-weight-bolder">'.$row5['date_issued'].'</td>
															<td class="font-weight-bolder">'.$rowcount.'</td>
															<td class="font-weight-bolder">'.$rowcount1.'</td>
														</tr>'
													;
												}
											}else{
												echo'
														<tr style="cursor: pointer;" class="text-black" onclick="open_details_cc(&quot;'.$row4['id_no'].'~!~'.$row4['process_final_initial'].'~!~'.$row4['practice_training'].'~!~'.$row4['process_under'].'&quot;)">
															<td class="font-weight-bolder">'.$row4['id_no'].'</td>
															<td class="font-weight-bolder">'.$row4['name'].'</td>
															<td class="font-weight-bolder">'.$row4['category'].'</td>
															<td class="font-weight-bolder">'.$row4['position'].'</td>
															<td class="font-weight-bolder">'.$row4['department'].'</td>
															<td class="font-weight-bolder">'.$row4['process_under'].'</td>
															<td class="font-weight-bolder"></td>
															<td class="font-weight-bolder"></td>
															<td class="font-weight-bolder">'.$rowcount.'</td>
															<td class="font-weight-bolder">'.$rowcount1.'</td>
														</tr>'
													;
											}
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
}
else if($operation == "search_all_by_id"){
	$id_no = $_GET['id_no'];
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
					<td class="font-weight-bolder">'.$row['process_under'].'</td>
					<td class="font-weight-bolder">'.$row['details'].'</td>
					<td class="font-weight-bolder">'.$row['date_report_tc'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
else if($operation == "search_to_view_det"){
	$id_no = $_GET['id_no'];
	$id = $_GET['id'];
	$sql = "SELECT * FROM ir_memo WHERE id_no ='$id_no' AND id='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo $row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['ir_copy'].'~!~'.$row['car_model'].'~!~'.$row['line'];
		}
	} else {
		echo "0 results";
	}
}
?>