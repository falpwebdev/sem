<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "search_all"){
	$limiter = mysqli_real_escape_string($conn, $_GET['limiter']);
	$limiter = $limiter + 20;
	$year  = date('Y');
	$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' ORDER BY id DESC LIMIT $limiter";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'
				<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'&quot;)">
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<!--td class="font-weight-bolder">'.$row['position'].'</td-->
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['car_model'].'</td>
					<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
					<td class="font-weight-bolder">'.$row['date_returned'].'</td>
					<td class="font-weight-bolder">'.$row['violation'].'</td>
					<td class="font-weight-bolder">'.$row['process_under'].'</td>
					<td class="font-weight-bolder">'.$row['details'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
if($operation == "search_single_notif"){
	$date_today = date("Y-m-d");
	$limiter = mysqli_real_escape_string($conn, $_GET['limiter']);
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$limiter = $limiter + 20;
	$year  = date('Y');
	$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' AND id='$id' AND id_no='$id_no' AND date_returned='$date_today' ORDER BY id DESC LIMIT $limiter";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
				<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'&quot;)">
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<!--td class="font-weight-bolder">'.$row['position'].'</td-->
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['car_model'].'</td>
					<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
					<td class="font-weight-bolder">'.$row['date_returned'].'</td>
					<td class="font-weight-bolder">'.$row['violation'].'</td>
					<td class="font-weight-bolder">'.$row['process_under'].'</td>
					<td class="font-weight-bolder">'.$row['details'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
if($operation == "search_all_notif"){
	$limiter = mysqli_real_escape_string($conn, $_GET['limiter']);
	$date_returned = mysqli_real_escape_string($conn, $_GET['date_returned']);
	$limiter = $limiter + 20;
	$year  = date('Y');
	$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' AND date_returned='$date_returned' ORDER BY id DESC LIMIT $limiter";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'
				<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'&quot;)">
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<!--td class="font-weight-bolder">'.$row['position'].'</td-->
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['car_model'].'</td>
					<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
					<td class="font-weight-bolder">'.$row['date_returned'].'</td>
					<td class="font-weight-bolder">'.$row['violation'].'</td>
					<td class="font-weight-bolder">'.$row['process_under'].'</td>
					<td class="font-weight-bolder">'.$row['details'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
else if($operation == "filter_by_year"){
	$year = mysqli_real_escape_string($conn, $_GET['year']);
	$limiter = mysqli_real_escape_string($conn, $_GET['limiter']);
	$limiter = $limiter + 20;
	$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' ORDER BY id DESC LIMIT $limiter";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'
				<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'&quot;)">
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<!--td class="font-weight-bolder">'.$row['position'].'</td-->
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['car_model'].'</td>
					<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
					<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
					<td class="font-weight-bolder">'.$row['date_returned'].'</td>
					<td class="font-weight-bolder">'.$row['violation'].'</td>
					<td class="font-weight-bolder">'.$row['process_under'].'</td>
					<td class="font-weight-bolder">'.$row['details'].'</td>
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
else if($operation == "year_filter"){
	$sql = "Select EXTRACT(year from date_suspended_from) as MYEAR from ir_memo group by EXTRACT(year from date_suspended_from)";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<div class="text-white text-center mt-1" onclick="filter_by_year(&quot;'.$row['MYEAR'].'&quot;)"><i class="fas fa-calendar"></i> '.$row['MYEAR'].' </div>';
		}
	} else {
		echo "0 results";
	}
}
else if($operation == "open_details_modal"){
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$sql = "SELECT * FROM ir_memo WHERE id='$id' AND id_no='$id_no' ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'
				'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['car_model'].'~!~'.$row['ir_copy'].'~!~'.$row['line'].'
			';
		}
	} else {
		echo "0 results";
	}
}
else if($operation == "search_ir"){
	$limiter = mysqli_real_escape_string($conn, $_GET['limiter']);
	$limiter = $limiter + 20;
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	$year = mysqli_real_escape_string($conn, $_GET['year']);
	$search_by = mysqli_real_escape_string($conn, $_GET['search_by']);
	if($search_by == "ID"){
		$search_by = "id_no";
	}else if($search_by == "Name"){
		$search_by = "name";
	}else if($search_by == "Category"){
		$search_by = "category";
	}else if($search_by == "Position"){
		$search_by = "position";
	}else if($search_by == "Date Suspended From"){
		$search_by = "date_suspended_from";
	}else if($search_by == "Date Suspended To"){
		$search_by = "date_suspended_to";
	}else if($search_by == "Date Returned To"){
		$search_by = "date_returned";
	}else if($search_by == "Process"){
		$search_by = "process_under";
	}else if($search_by == "Search By"){
		$search_by = "name";
	}
	if($year != ''){
		$year  = $year;
	}else{
		$year  = date('Y');	
	}
	if($keyword != ''){
		$sql = "SELECT * FROM ir_memo WHERE $search_by LIKE '%$keyword%' ORDER BY id DESC LIMIT $limiter";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				echo'
					<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'&quot;)">
						<td class="font-weight-bolder">'.$row['id_no'].'</td>
						<td class="font-weight-bolder">'.$row['name'].'</td>
						<td class="font-weight-bolder">'.$row['category'].'</td>
						<!--td class="font-weight-bolder">'.$row['position'].'</td-->
						<td class="font-weight-bolder">'.$row['department'].'</td>
						<td class="font-weight-bolder">'.$row['car_model'].'</td>
						<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
						<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
						<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
						<td class="font-weight-bolder">'.$row['date_returned'].'</td>
						<td class="font-weight-bolder">'.$row['violation'].'</td>
						<td class="font-weight-bolder">'.$row['process_under'].'</td>
						<td class="font-weight-bolder">'.$row['details'].'</td>
						<td class="font-weight-bolder">'.$row['remarks'].'</td>
					</tr>
				';
			}
		} else {
			echo "0 results";
		}
	}
	else{
		$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' ORDER BY id DESC LIMIT $limiter";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				echo'
					<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['ir_copy'].'&quot;)">
						<td class="font-weight-bolder">'.$row['id_no'].'</td>
						<td class="font-weight-bolder">'.$row['name'].'</td>
						<td class="font-weight-bolder">'.$row['category'].'</td>
						<!--td class="font-weight-bolder">'.$row['position'].'</td-->
						<td class="font-weight-bolder">'.$row['department'].'</td>
						<td class="font-weight-bolder">'.$row['car_model'].'</td>
						<td class="font-weight-bolder">'.$row['no_of_days'].'</td>
						<td class="font-weight-bolder">'.$row['date_suspended_from'].'</td>
						<td class="font-weight-bolder">'.$row['date_suspended_to'].'</td>
						<td class="font-weight-bolder">'.$row['date_returned'].'</td>
						<td class="font-weight-bolder">'.$row['violation'].'</td>
						<td class="font-weight-bolder">'.$row['process_under'].'</td>
						<td class="font-weight-bolder">'.$row['details'].'</td>
						<td class="font-weight-bolder">'.$row['remarks'].'</td>
					</tr>
				';
			}
		} else {
			echo "0 results";
		}
	}
}
else if($operation == "search_id_no"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	if($keyword != ""){
		$sql = "SELECT * FROM deployed_employee WHERE id_no LIKE '%$keyword%' LIMIT 10";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo'
					<a class="dropdown-item" onclick="select_details(&quot;'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['department'].'~!~'.$row['position'].'&quot;)"> '.$row['id_no'].', '.$row['name'].' </a>
					<div class="dropdown-divider"></div>
				';
			}
		} else {
			echo'
				<a class="dropdown-item"> No Record Found </a>
				<div class="dropdown-divider"></div>
			';
		}
	}else{
		
	}
}
else if($operation == "search_id_no"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	if($keyword != ""){
		$sql = "SELECT * FROM deployed_employee WHERE id_no LIKE '%$keyword%' LIMIT 10";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo'
					<a class="dropdown-item" onclick="select_details(&quot;'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['department'].'~!~'.$row['position'].'&quot;)"> '.$row['id_no'].' </a>
					<div class="dropdown-divider"></div>
				';
			}
		} else {
			echo'
				<a class="dropdown-item"> No Record Found </a>
				<div class="dropdown-divider"></div>
			';
		}
	}else{
		
	}
}
else if($operation == "find_violation"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	if($keyword != ""){
		$sql = "SELECT * FROM ir_memo WHERE id_no = '$keyword'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			 $rowcount=mysqli_num_rows($result);
				echo'
					<a href="history_ir.php?id_no='.$keyword.'" target="_blank" class="text-black" title="Click Here to View the IR History"> <i class="fas fa-exclamation"></i> '. $rowcount.'</a> Violation Found
				';
		} else {
			echo'
				<i class="fas fa-exclamation"></i> No Violation Found
			';
		}
	}else{
		
	}
}
else if($operation == "search_ir_history"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	$sql = "SELECT * FROM ir_memo WHERE id_no='$keyword' ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo'
				<tr style="cursor: pointer;" class="text-black" onclick="open_details(&quot;'.$row['id'].'~!~'.$row['id_no'].'~!~'.$row['name'].'~!~'.$row['category'].'~!~'.$row['position'].'~!~'.$row['department'].'~!~'.$row['car_model'].'~!~'.$row['no_of_days'].'~!~'.$row['date_suspended_from'].'~!~'.$row['date_suspended_to'].'~!~'.$row['date_returned'].'~!~'.$row['violation'].'~!~'.$row['details'].'~!~'.$row['process_final_initial'].'~!~'.$row['practice_training'].'~!~'.$row['process_under'].'~!~'.$row['date_report_tc'].'~!~'.$row['remarks'].'~!~'.$row['car_model'].'~!~'.$row['ir_copy'].'&quot;)">
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
					<td class="font-weight-bolder">'.$row['remarks'].'</td>
				</tr>
			';
		}
	} else {
		echo "0 results";
	}
}
?>