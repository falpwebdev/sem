<?php
include '../../Connection/Connect.php';
$datenow = date('Y-m-d');
$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
$year = mysqli_real_escape_string($conn, $_GET['year']);
if($year != ''){
		$year  = $year;
}else{
	$year  = date('Y');	
}
$filename = "Ongoing Practice Training".$datenow.".xls";
// header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv; charset=utf-8');  
header("Content-Disposition: ; filename=\"$filename\"");
echo'
<html lang="en">
<body>
<table border="1">
<thead>
	<tr>
		<th colspan="19"><center><h3>Incident Report of '.$year.'</h3><center></th>
	</tr>
	<tr>
		<th>ID No.</th>
		<th>Name</th>
		<th>Batch No.</th>
		<th>Category</th>
		<th>Position</th>
		<th>Department</th>
		<th>Car Model</th>
		<th>Lines</th>
		<th>No. of Days</th>
		<th>Date Suspended From</th>
		<th>Date Suspended To</th>
		<th>Date Returned</th>
		<th>Violation</th>
		<th>Details</th>
		<th>Process</th>
		<th>Practice Training</th>
		<th>Specific Process</th>
		<th>Date Report TC.</th>
		<th>Remarks</th>
	</tr>
</thead>
';
if($keyword != ''){
	$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' AND (id_no LIKE '%$keyword%' OR name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR position LIKE '%$keyword%' OR department LIKE '%$keyword%' OR car_model LIKE '%$keyword%' OR date_suspended_from LIKE '%$keyword%' OR date_suspended_to LIKE '%$keyword%' OR date_returned LIKE '%$keyword%' OR process_final_initial LIKE '%$keyword%' OR date_report_tc LIKE '%$keyword%') ORDER BY id DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$sql1 = "SELECT batch_no FROM deployed_employee WHERE id_no='".$row['id_no']."' ";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0) {
					while($row1 = $result1->fetch_assoc()){
						echo'
							<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['ir_copy'].'&quot;)">
								<td class="font-weight-bolder">'.$row['id_no'].'</td>
								<td class="font-weight-bolder">'.$row['name'].'</td>
								<td class="font-weight-bolder">'.$row1['batch_no'].'</td>
								<td class="font-weight-bolder">'.$row['category'].'</td>
								<td class="font-weight-bolder">'.$row['position'].'</td>
								<td class="font-weight-bolder">'.$row['department'].'</td>
								<td class="font-weight-bolder">'.$row['car_model'].'</td>
								<td class="font-weight-bolder">'.$row['line'].'</td>
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
				}else{
					echo'
						<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['ir_copy'].'&quot;)">
							<td class="font-weight-bolder">'.$row['id_no'].'</td>
							<td class="font-weight-bolder">'.$row['name'].'</td>
							<td class="font-weight-bolder"></td>
							<td class="font-weight-bolder">'.$row['category'].'</td>
							<td class="font-weight-bolder">'.$row['position'].'</td>
							<td class="font-weight-bolder">'.$row['department'].'</td>
							<td class="font-weight-bolder">'.$row['car_model'].'</td>
							<td class="font-weight-bolder">'.$row['line'].'</td>
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
			}
		} else {
			echo "0 results";
		}
	}
	else{
		$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' ORDER BY id DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$sql1 = "SELECT batch_no FROM deployed_employee WHERE id_no='".$row['id_no']."' ";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0) {
					while($row1 = $result1->fetch_assoc()){
						echo'
							<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['ir_copy'].'&quot;)">
								<td class="font-weight-bolder">'.$row['id_no'].'</td>
								<td class="font-weight-bolder">'.$row['name'].'</td>
								<td class="font-weight-bolder">'.$row1['batch_no'].'</td>
								<td class="font-weight-bolder">'.$row['category'].'</td>
								<td class="font-weight-bolder">'.$row['position'].'</td>
								<td class="font-weight-bolder">'.$row['department'].'</td>
								<td class="font-weight-bolder">'.$row['car_model'].'</td>
								<td class="font-weight-bolder">'.$row['line'].'</td>
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
				}else{
					echo'
						<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['ir_copy'].'&quot;)">
							<td class="font-weight-bolder">'.$row['id_no'].'</td>
							<td class="font-weight-bolder">'.$row['name'].'</td>
							<td class="font-weight-bolder"></td>
							<td class="font-weight-bolder">'.$row['category'].'</td>
							<td class="font-weight-bolder">'.$row['position'].'</td>
							<td class="font-weight-bolder">'.$row['department'].'</td>
							<td class="font-weight-bolder">'.$row['car_model'].'</td>
							<td class="font-weight-bolder">'.$row['line'].'</td>
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
			}
		} else {
			echo "0 results";
		}
	}
echo'
</table>
</body>
</html>
';
?>