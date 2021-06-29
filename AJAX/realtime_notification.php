<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "returned"){
	$date_today = date('Y-m-d');
	$date_end = explode('-',$date_today);
	// CONSTRUCT END DATE (1 DAY INTERVAL)
	$construct = $date_end[0].'-'.$date_end[1].'-'.($date_end[2] + 1);
	// QUERY
	$sql = "SELECT date_returned FROM ir_memo WHERE date_returned >= '$date_today' AND date_returned <= '$construct'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
	}
}
else if($operation == "for_practice"){
	$sql = "SELECT status FROM cc_or_refresh WHERE status = 'Practice Training'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "ongoing_practice"){
	$sql = "SELECT status FROM practice_training_details WHERE status = 'Ongoing'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "passed_practice"){
	$sql = "SELECT status FROM practice_training_details WHERE status = 'Passed'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "failed_practice"){
	$sql = "SELECT status FROM practice_training_details WHERE status = 'Failed'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "for_refresh"){
	$sql = "SELECT status FROM cc_or_refresh WHERE status = 'Refresh Training'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "ongoing_refresh"){
	$sql = "SELECT status FROM refresh_training_details WHERE status = 'Ongoing'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "completed_refresh"){
	$sql = "SELECT status FROM refresh_training_details WHERE status = 'Completed'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "incomplete_refresh"){
	$sql = "SELECT status FROM refresh_training_details WHERE status = 'Incomplete'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		 $rowcount=mysqli_num_rows($result);
		 echo $rowcount;
	}
}
else if($operation == "get_notification_content"){
	$date_today = date("Y-m-d");
	$sql = "SELECT id, id_no, name, date_returned FROM ir_memo WHERE date_returned <= '$date_today'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		$rowcount=mysqli_num_rows($result);
		if($rowcount > 1){
			while($row = $result->fetch_assoc()){
			echo'
				<div class="media ml-1" style="cursor:pointer;" onclick="open_notification_content_single(&quot;'.$row['id'].'~!~'.$row['id_no'].'&quot;)">
					<img class="card-img-100 img-fluid rounded-circle d-flex z-depth-1 mr-3" src="Images/pdf_background.jpg" style="width:60px;height:60px;" alt="Profile">
					<div class="media-body text-white">
						<label class="font-weight-bold">
							'. $row['name'] .'
						</label><br>
						<label> Date Return: '.$date_today.' </label>
					</div>
				</div>
				<hr>
			';
			}
			echo'<div class="text-white text-center" style="cursor:pointer;"><label style="cursor:pointer;" onclick="open_notification_content_all(&quot;'.$date_today.'&quot;)">View all</lable></div>';
		}else{
			while($row = $result->fetch_assoc()){
				echo'
					<div class="media ml-1" style="cursor:pointer;" onclick="open_notification_content_single(&quot;'.$row['id'].'~!~'.$row['id_no'].'&quot;)">
						<img class="card-img-100 img-fluid rounded-circle d-flex z-depth-1 mr-3" src="Images/pdf_background.jpg" style="width:60px;height:60px;" alt="Profile">
						<div class="media-body text-white">
							<label class="font-weight-bold">
								'. $row['name'] .'
							</label><br>
							<label> Date Return: '.$row['date_returned'].' </label>
						</div>
					</div>
					<hr>
				';
			}			
		}
		
	}
}
?>