<?php
$conn =new mysqli('localhost', 'root', '', 'sem_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>