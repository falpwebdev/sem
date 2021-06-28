<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "search_all"){
	$year  = date('Y');
	$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		  $rowcount=mysqli_num_rows($result);
		  echo $rowcount;
	} else {
	}
}
else if($operation == "filter_by_year"){
	$year = mysqli_real_escape_string($conn, $_GET['year']);
	$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' ORDER BY id DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
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
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	$year = mysqli_real_escape_string($conn, $_GET['year']);
	if($year != ''){
		$year = $year;
	}else{
		$year = date('Y');	
	}
	if($keyword != ''){
		$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' AND (id_no LIKE '%$keyword%' OR name LIKE '%$keyword%' OR category LIKE '%$keyword%' OR position LIKE '%$keyword%' OR department LIKE '%$keyword%' OR car_model LIKE '%$keyword%' OR date_suspended_from LIKE '%$keyword%' OR date_suspended_to LIKE '%$keyword%' OR date_returned LIKE '%$keyword%' OR process_final_initial LIKE '%$keyword%' OR date_report_tc LIKE '%$keyword%') ORDER BY id DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			$rowcount=mysqli_num_rows($result);
			echo $rowcount;
		} else {
			echo 0;
		}
	}
	else{
		$sql = "SELECT * FROM ir_memo WHERE date_suspended_from LIKE '%$year%' ORDER BY id DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$rowcount=mysqli_num_rows($result);
			echo $rowcount;
		} else {
			echo 0;
		}
	}
}
?>