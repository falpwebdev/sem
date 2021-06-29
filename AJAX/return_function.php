<?php
include '../Connection/Connect.php';
$method = $_POST['method'];

if($method == 'for_return_employees'){
    $date_today = date('Y-m-d');
    $date_end = explode('-',$date_today);
	// CONSTRUCT END DATE (1 DAY INTERVAL)
	$construct = $date_end[0].'-'.$date_end[1].'-'.($date_end[2] + 1);
	// QUERY
	$sql = "SELECT id FROM ir_memo WHERE date_returned >= '$date_today' AND date_returned <= '$construct'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
    //GET FOR RETURN
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$row['id_no'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['category'].'</td>';
            echo '<td>'.$row['position'].'</td>';
            echo '<td>'.$row['department'].'</td>';
            echo '<td>'.$row['car_model'].'</td>';
            echo '<td>'.$row['no_of_days'].'</td>';
            echo '<td>'.$row['date_suspended_from'].'</td>';
            echo '<td>'.$row['date_suspended_to'].'</td>';
            echo '<td>'.$row['violation'].'</td>';
            echo '<td>'.$row['process_final_initial'].'</td>';
            echo '<td>'.$row['details'].'</td>';
            echo '<td>'.$row['remarks'].'</td>';
            echo '</tr>';
        }
	}else{
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO DATA</td>';
        echo '</tr>';
    }
}

if($method == 'not_returned_employees'){
    // $sql = "SELECT * FROM return_status RIGHT JOIN ir_memo ON return_status.id = ir_memo.id WHERE return_status = 0";
    $sql = "SELECT *FROM ir_memo WHERE return_status = 0 AND date_return <= '$date_today' ";
    $res = $conn->query($sql);
    if($result->num_rows > 0){

    }
}
?>