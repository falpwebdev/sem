<?php
include '../Connection/Connect.php';
$operation = mysqli_real_escape_string($conn, $_GET['operation']);
if($operation == "all"){
	$sql = "SELECT * FROM sem_account";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sql1 = "SELECT * FROM profile WHERE id_image='".$row['profile']."'";
			$result1 = $conn->query($sql1);
			if($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					echo'
						<div class="card col-sm-2" style="cursor:pointer;" onclick="get_data_user(&quot;'.$row['id'].'~!~'.$row['username'].'~!~'.$row['name'].'~!~'.$row['role'].'~!~'.$row['password'].'~!~'.$row1['id_image'].'~!~'.$row['role_assign'].'&quot;)">
							<div class="mx-md-n2">
								<img src="Images/pdf_background.jpg" class="img-fluid">
							</div>
							<div class="rounded-circle white card-img-100 mx-auto" style="margin-top:-55px;width:110px;height:110px;cursor:pointer;">
							<img src="Profile/'.$row1['location'].'" class="img-fluid card-img-100 rounded-circle" style="margin-left:5px;margin-top:5px;"></div>
							<div class="text-center">
								<label class="h5"> '.$row['name'].' </label><br>
								<label>Role: '.$row['role'].' </label><br>
								<label>Username: '.$row['username'].' </label>
							</div>
						</div>
					';
				}
			}
		}
	}
}
else if($operation == "search"){
	$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
	$sql = "SELECT * FROM sem_account WHERE username LIKE '%$keyword%' OR name LIKE '%$keyword%' OR role LIKE '%$keyword%'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sql1 = "SELECT * FROM profile WHERE id_image='".$row['profile']."'";
			$result1 = $conn->query($sql1);
			if($result1->num_rows > 0){
				while($row1 = $result1->fetch_assoc()){
					echo'
						<div class="card col-sm-2" style="cursor:pointer;" onclick="get_data_user(&quot;'.$row['id'].'~!~'.$row['username'].'~!~'.$row['name'].'~!~'.$row['role'].'~!~'.$row['password'].'~!~'.$row1['location'].'~!~'.$row['role_assign'].'&quot;)">
							<div class="mx-md-n2">
								<img src="Images/pdf_background.jpg" class="img-fluid">
							</div>
							<div class="rounded-circle white card-img-100 mx-auto" style="margin-top:-55px;width:110px;height:110px;cursor:pointer;"><img src="Profile/'.$row1['location'].'" class="img-fluid card-img-100 rounded-circle" style="margin-left:5px;margin-top:5px;"></div>
							<div class="text-center">
								<label class="h5"> '.$row['name'].' </label><br>
								<label>Role: '.$row['role'].' </label><br>
								<label>Username: '.$row['username'].' </label>
							</div>
						</div>
					';
				}
			}
		}
	}
}
else if($operation == 'save'){
	$username = mysqli_real_escape_string($conn, $_GET['username']);
	$name = mysqli_real_escape_string($conn, $_GET['name']);
	$role = mysqli_real_escape_string($conn, $_GET['role']);
	$role_assigned = mysqli_real_escape_string($conn, $_GET['role_assigned']);
	$password = mysqli_real_escape_string($conn, $_GET['password']);
	$id_uploaded_image = mysqli_real_escape_string($conn, $_GET['id_uploaded_image']);
	$sql = "INSERT INTO sem_account (username, name, password, role, role_assign, profile)
	VALUES ('$username', '$name', '$password', '$role', '$role_assigned', '$id_uploaded_image')";

	if ($conn->query($sql) === TRUE) {
		echo "New account created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if($operation == 'update'){
	$id_hidden = mysqli_real_escape_string($conn, $_GET['id_hidden']);
	$username = mysqli_real_escape_string($conn, $_GET['username']);
	$name = mysqli_real_escape_string($conn, $_GET['name']);
	$role = mysqli_real_escape_string($conn, $_GET['role']);
	$role_assigned = mysqli_real_escape_string($conn, $_GET['role_assigned']);
	$password = mysqli_real_escape_string($conn, $_GET['password']);
	$id_uploaded_image = mysqli_real_escape_string($conn, $_GET['id_uploaded_image']);
	$sql = "UPDATE sem_account SET username='$username', name='$name', role='$role', role_assign='$role_assigned', password='$password', profile='$id_uploaded_image' WHERE id='$id_hidden'";
	if ($conn->query($sql) === TRUE) {
		echo "Account updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

}
else if($operation == 'delete'){
	$id_hidden = mysqli_real_escape_string($conn, $_GET['id_hidden']);
	$sql = "DELETE FROM sem_account WHERE id='$id_hidden'";
	if ($conn->query($sql) === TRUE) {
		echo "Account deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

}	
?>