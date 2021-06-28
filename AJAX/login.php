<?php
$username = $_GET['username'];
$password = $_GET['password'];
include "../Connection/Connect.php";
$sql = "SELECT * FROM sem_account WHERE username = '$username' && password = '$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
		$pic = $row['profile'];
		$sql1 = "SELECT * FROM profile WHERE id_image = '$pic'";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()){
				echo "unlocked";
				session_start();
				$_SESSION["username_session"] = $username;
				$_SESSION["role"] = $row['role'];
				$_SESSION["role_assign"] = $row['role_assign'];
				$_SESSION["user_pic"] = $row1['location'];;
			}
		}
		}
} else {
    echo "locked";
}
?>