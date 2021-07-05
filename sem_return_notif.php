<?php
    session_start();
    $username_session = $_SESSION['username_session'];
    if($username_session == ''){
        header('location:index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE RETURN NOTIFICATION</title>
    <link rel="shortcut icon" href="logo/fas.png" type="image/x-icon">
    <link rel="stylesheet" href="Fontawesome/fontawesome-free-5.9.0-web/css/all.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="mycss/style1.css" rel="stylesheet">
	<link href="mycss/loader.css" rel="stylesheet">
</head>
<body>
    <?php include 'Nav/header.php';?>

    <div class="row mt-4">
        <div class="col sm-12">
            <h5 class="d-flex justify-content-center" id="page_header_select" style="font-weight:bold;">--</h5>
            <button class="btn btn-sm btn-blue" onclick="for_return()">For Return</button>
            <button class="btn btn-sm btn-red" onclick="not_returned_emp()">Not Yet Returned</button>
            <button class="btn btn-sm btn-green" onclick="returned()">Returned</button>
            <input type="text" name="" class="mt-1 mr-1" id="search_notif" placeholder="Search" style="float:right;padding:5px;">

            
            <!-- TABLE DATA -->
        <div class="col sm-12 container" style="height:450px;overflow:auto;">
            <table class="table table-bordered" style="width:2000px;">
                <thead class="blue-grey lighten-4">
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Car Model</th>
                    <th>No. of Days</th>
                    <th>Suspended From</th>
                    <th>Suspended To</th>
                    <th>Date Returned</th>
                    <th>Violation</th>
                    <th>Process</th>
                    <th>Details</th>
                    <th>Remarks</th>
                    <th>Return Status</th>
                    <th>Return Remarks</th>
                </thead>
                <tbody id="return_table"></tbody>
            </table>
        </div>
        </div>
        
    </div>


<!-- JQUERY -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="myjs/nav.js"></script>
<script type="text/javascript" src="myjs/realtime_notification.js"></script>
<script type="text/javascript" src="myjs/notification_content.js"></script>

<!-- PAGE FUNCTIONS -->
<script type="text/javascript">
$(document).ready(function(){
    for_return();
});
function for_return(){
    $.ajax({
        url: 'AJAX/return_function.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'for_return_employees'
        },success:function(response){
            document.querySelector('#return_table').innerHTML = response;  
            document.querySelector('#page_header_select').innerHTML = 'FOR RETURN';

        }
    });
}

function not_returned_emp(){
    $.ajax({
        url:'AJAX/return_function.php',
        type:'POST',
        cache:false,
        data:{
            method: 'not_returned_employees'
        },success:function(response){
            // console.log(response);
            document.querySelector('#page_header_select').innerHTML = 'NOT RETURNED EMPLOYEES';
            document.querySelector('#return_table').innerHTML = response;
        }
    });
}

function returned(){
    $.ajax({
        url: 'AJAX/return_function.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'returned'
        },success:function(response){
            document.querySelector('#page_header_select').innerHTML = 'RETURNED EMPLOYEES';
            document.querySelector('#return_table').innerHTML = response;
        }
    });
}


</script>
</body>
</html>