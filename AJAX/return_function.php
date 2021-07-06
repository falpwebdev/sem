<?php
include '../Connection/PDO_conn.php';
$method = $_POST['method'];
$date_today = date('Y-m-d');
if($method == 'for_return_employees'){
    $date_end = explode('-',$date_today);
	// CONSTRUCT END DATE (1 DAY INTERVAL)
    
	$construct = $date_end[0].'-'.$date_end[1].'-0'.($date_end[2] + 1);
    
	// QUERY
	$sql = "SELECT * FROM ir_memo WHERE date_returned >= '$date_today' AND date_returned <= DATE_ADD('$date_today',INTERVAL 1 DAY) AND date_report_tc = '' ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $c = 0;
	if($stmt->rowCount() > 0){
    //GET FOR RETURN
        foreach($stmt->fetchALL() as $row){
            $c++;
            echo '<tr 
            onclick="open_on_modal(&quot;'
            .$row['id'].'~!~'
            .$row['id_no'].'~!~'
            .$row['name'].'~!~'
            .$row['violation'].'~!~'
            .$row['details'].'~!~'
            .$row['remarks'].'~!~'
            .$row['return_remarks'].'~!~'.
            'for_return'.
            '&quot;)" style="cursor:pointer;">';
            echo '<td>'.$c.'</td>';
            echo '<td>'.$row['id_no'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['category'].'</td>';
            echo '<td>'.$row['position'].'</td>';
            echo '<td>'.$row['department'].'</td>';
            echo '<td>'.$row['car_model'].'</td>';
            echo '<td>'.$row['no_of_days'].'</td>';
            echo '<td>'.$row['date_suspended_from'].'</td>';
            echo '<td>'.$row['date_suspended_to'].'</td>';
            echo '<td>'.$row['date_returned'].'</td>';
            echo '<td>'.$row['violation'].'</td>';
            echo '<td>'.$row['process_final_initial'].'</td>';
            echo '<td>'.$row['details'].'</td>';
            echo '<td>'.$row['remarks'].'</td>';
            echo '<td style="background-color:blue;color:white;">FOR RETURN</td>';
            echo '<td>'.$row['return_remarks'].'</td>';
            echo '</tr>';
        }
}else{
    echo '<tr>';
    echo '<td colspan="17" style="text-align:center;">NO DATA</td>';
    echo '</tr>';
}
}

if($method == 'not_returned_employees'){
    $sql = "SELECT *FROM ir_memo WHERE date_returned <= '$date_today' AND date_report_tc = '' ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $c = 0;
    if($stmt->rowCount() > 0){
        foreach($stmt->fetchALL() as $row){
            $c++;
            echo '<tr 
            onclick="open_on_modal(&quot;'
            .$row['id'].'~!~'
            .$row['id_no'].'~!~'
            .$row['name'].'~!~'
            .$row['violation'].'~!~'
            .$row['details'].'~!~'
            .$row['remarks'].'~!~'
            // .$row['return_status'].'~!~'
            .$row['return_remarks'].'~!~'.
            'not_return'.
            '&quot;)" style="cursor:pointer;">';
            echo '<td>'.$c.'</td>';
            echo '<td>'.$row['id_no'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['category'].'</td>';
            echo '<td>'.$row['position'].'</td>';
            echo '<td>'.$row['department'].'</td>';
            echo '<td>'.$row['car_model'].'</td>';
            echo '<td>'.$row['no_of_days'].'</td>';
            echo '<td>'.$row['date_suspended_from'].'</td>';
            echo '<td>'.$row['date_suspended_to'].'</td>';
            echo '<td>'.$row['date_returned'].'</td>';
            echo '<td>'.$row['violation'].'</td>';
            echo '<td>'.$row['process_final_initial'].'</td>';
            echo '<td>'.$row['details'].'</td>';
            echo '<td>'.$row['remarks'].'</td>';
            echo '<td style="background-color:red;color:white;">NOT YET REPORTED</td>';
            echo '<td>'.$row['return_remarks'].'</td>';
            echo '</tr>';
        }
}else{
    echo '<tr>';
    echo '<td colspan="17" style="text-align:center;">NO DATA</td>';
    echo '</tr>';
}
}

if($method == 'returned'){
    $sql = "SELECT *FROM ir_memo WHERE date_report_tc != '' ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $c = 0;
    if($stmt->rowCount() > 0){
        foreach($stmt->fetchALL() as $row){
            $c++;
            echo '<tr 
            onclick="open_on_modal(&quot;'
            .$row['id'].'~!~'
            .$row['id_no'].'~!~'
            .$row['name'].'~!~'
            .$row['violation'].'~!~'
            .$row['details'].'~!~'
            .$row['remarks'].'~!~'
            // .$row['return_status'].'~!~'
            .$row['return_remarks'].'~!~'.
            'returned'.
            '&quot;)" style="cursor:pointer;">';
            echo '<td>'.$c.'</td>';
            echo '<td>'.$row['id_no'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['category'].'</td>';
            echo '<td>'.$row['position'].'</td>';
            echo '<td>'.$row['department'].'</td>';
            echo '<td>'.$row['car_model'].'</td>';
            echo '<td>'.$row['no_of_days'].'</td>';
            echo '<td>'.$row['date_suspended_from'].'</td>';
            echo '<td>'.$row['date_suspended_to'].'</td>';
            echo '<td>'.$row['date_returned'].'</td>';
            echo '<td>'.$row['violation'].'</td>';
            echo '<td>'.$row['process_final_initial'].'</td>';
            echo '<td>'.$row['details'].'</td>';
            echo '<td>'.$row['remarks'].'</td>';
            echo '<td style="background-color:green;color:white;">ALREADY RETURN</td>';
            echo '<td>'.$row['return_remarks'].'</td>';
            echo '</tr>';
        }
}else{
    echo '<tr>';
    echo '<td colspan="17" style="text-align:center;">NO DATA</td>';
    echo '</tr>';
}
}


if($method == 'update_return_status'){
    // VARIABLES
    $record_id = $_POST['rec_id'];
    $return_remarks = $_POST['return_remarks'];
    // QUERY 
    $updateQL = "UPDATE ir_memo SET  return_remarks = '$return_remarks' WHERE id = '$record_id'";
    $stmt = $conn->prepare($updateQL);
    if($stmt->execute()){
        echo 'success';
    }else{
        echo 'fail';
    }
}
?>