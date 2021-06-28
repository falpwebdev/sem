<?php
include '../../Connection/Connect.php';
$datenow = date('Y-m-d');
$filename = "Format Deployed".$datenow.".xls";
// header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv; charset=utf-8');  
header("Content-Disposition: ; filename=\"$filename\"");
echo'
<html lang="en">
<body>
<table border="1">
<thead>
	<tr>
		<th>Batch No.</th>
		<th>ID No.</th>
		<th>Name</th>
		<th>Category</th>
		<th>Department</th>
		<th>Position</th>
		<th>Date Deployed</th>
	</tr>
</thead>
';
$sql = "SELECT * FROM deployed_employee ORDER BY batch_no ASC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			echo'
				<tr class="text-black">
					<td class="font-weight-bolder">'.$row['batch_no'].'</td>
					<td class="font-weight-bolder">'.$row['id_no'].'</td>
					<td class="font-weight-bolder">'.$row['name'].'</td>
					<td class="font-weight-bolder">'.$row['category'].'</td>
					<td class="font-weight-bolder">'.$row['department'].'</td>
					<td class="font-weight-bolder">'.$row['position'].'</td>
					<td class="font-weight-bolder">'.$row['date_deployed'].'</td>
				</tr>
			';
		}		
	} else {
		echo "0 results";
	}
echo'
</table>
</body>
</html>
';
?>