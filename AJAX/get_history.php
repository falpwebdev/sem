<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation = "get_history_process"){
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);	
	$sql = "SELECT * FROM ir_memo WHERE id_no ='$id_no' ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
				<tr style="cursor: pointer;" class="text-black" onclick="open_on_large(&quot;'.$row['id_no'].'~!~'.$row['id'].'&quot;)">
					<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
					<td class="font-weight-bolder">'.$row['process_final_initial'].'</td>
					<td class="font-weight-bolder">'.$row['practice_training'].'</td>
					<td class="font-weight-bolder">'.$row['process_under'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
?>