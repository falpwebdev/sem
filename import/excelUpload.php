<?php
set_time_limit(0);
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
$dbHost = "localhost";
$dbDatabase = "sem_db";
$dbPasswrod = "";
$dbUser = "root";
$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
//print_r($_FILES);
$mimes = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
if(in_array($_FILES["file"]["type"],$mimes)){
	$uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
	$Reader = new SpreadsheetReader($uploadFilePath);
	//echo $uploadFilePath;
	$totalSheet = count($Reader->sheets());
	//echo "You have total ".$totalSheet." sheets".
	$html="<table border='1'>";
	$html.="<tr><th>batch_no</th><th>id_no</th><th>name</th><th>category</th><th>department</th><th>position</th><th>date_deployed</th></tr>";
	/* For Loop for all sheets */
	$connn =new mysqli('localhost', 'root', '', 'sem_db');
	if ($connn->connect_error) {
	die("Connection failed: " . $connn->connect_error);
	}
	for($i=0;$i<$totalSheet;$i++)
	{
		$Reader->ChangeSheet($i);
		foreach ($Reader as $Row)
		{
			$batch_no = isset($Row[0]) ? $Row[0] : '';
			$id_no = isset($Row[1]) ? $Row[1] : '';
			$name = isset($Row[2]) ? $Row[2] : '';
			$category = isset($Row[3]) ? $Row[3] : '';
			$department = isset($Row[4]) ? $Row[4] : '';
			$position = isset($Row[5]) ? $Row[5] : '';
			$date_deployed = isset($Row[6]) ? $Row[6] : '';
			
			$sql = "SELECT id_no FROM deployed_employee WHERE id_no LIKE '%$id_no%' LIMIT 1";
			$result = $connn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$sql1 = "UPDATE deployed_employee SET batch_no='$batch_no', name='$name', category='$category', department='$department', position='$position', date_deployed='$date_deployed' WHERE id_no= '$id_no'";
					if ($connn->query($sql1) === TRUE){
						
					} else {
						
					}
				}
			}else{
				$query = "insert into deployed_employee(id,batch_no,id_no,name,category,department,position,date_deployed,remarks) values('','".$batch_no."','".$id_no."','".$name."','".$category."','".$department."','".$position."','".$date_deployed."','')";
				$mysqli->query($query);
			}
		}
	}
		//echo $html;
		echo 'uploaded';
	}
	else
	{
		die("<br/>Sorry, File type is not allowed. Only Excel file.");
	}
?>