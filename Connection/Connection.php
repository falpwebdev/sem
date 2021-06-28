<?php
$conn1 =new mysqli('172.25.112.207', 'root', '', 'hr_db');
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}
?>