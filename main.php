<?php
	session_start();
	$username_session = $_SESSION["username_session"];
	if($username_session == ''){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>IR / MEMO</title>
	<!-- Title Logo -->
	<link rel="icon" href="logo/fas.png" type="image/x-icon"/>
	<!-- Font Awesome -->
	<!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"-->
	<link rel="stylesheet" href="Fontawesome/fontawesome-free-5.9.0-web/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="css/style.css" rel="stylesheet">
	<!-- My CSS -->
	<link href="mycss/style1.css" rel="stylesheet">
	<style>
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;   
    cursor: inherit;
    display: block;
}
	</style>
</head>
<body class="bg">
	<?php
		// This is for Navagation
		include 'Nav/header.php';
		include 'Modal/add_ir_memo.php';
	?>
	<div class="card_opa">
		<br>
		<div class="row">
			<div class="md-form mb-0 col-sm-3">
				<input type="text" id="Search" class="form-control text-center ml-3" oninput="search_ir()">
				<label for="Username" id="Sear_Label" class="ml-3"> <i class="fas fa-search ml-3"></i> Search</label>
			</div>
			<div class="col-sm-9 d-flex justify-content-end">
				<button class="btn btn-default mt-3" onclick="add_filters()"><i class="fas fa-plus"></i> Add Filters </button>
				<button class="btn btn-default mt-3" onclick="modal_action()"><i class="fas fa-plus"></i> Add IR/Memo </button>
			</div>
			<div class="col-sm-12 d-flex justify-content-center">
				<p class="h3">Incident Report</p>
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th><strong>ID No.:</strong></th>
							<th><strong>Name</strong></th>
							<th><strong>Category</strong></th>
							<th><strong>Position</strong></th>
							<th><strong>Department</strong></th>
							<th><strong>Car Model</strong></th>
							<th><strong>No. of Days</strong></th>
							<th><strong>Date Suspended</strong></th>
							<th><strong>Date Retuned</strong></th>
							<th><strong>Violation</strong></th>
							<th><strong>Details</strong></th>
							<th><strong>Process</strong></th>
							<th><strong>Date Report to TC</strong></th>
							<th><strong>Remarks</strong></th>
						</tr>
					</thead>
					<tbody id="table_content">
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script>
	<!-- To Display Data in the Table -->
	search_all();
	<!-- Function for Save and Search -->
	function modal_action(){ 
		document.getElementById('btn_update').style.display="none";
		document.getElementById('btn_delete').style.display="none";
		document.getElementById('btn_save').style.display="inline-block";
		$("#Add_IR_Memo_Form").modal();
		clear_data();
	}
	function delete_ir(){
		var id = document.getElementById('id_hidden').value;
		var id_no = document.getElementById('id_no').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				<!-- To Refresh Table -->
				search_all();
				clear_data();
			}
		};
		xhttp.open("GET", "AJAX/delete.php?operation=delete_ir&&id_hidden="+id+"&&id_no="+id_no, true);
		xhttp.send();
	}
	function update_ir(){
		var id = document.getElementById('id_hidden').value;
		var id_no = document.getElementById('id_no').value;
		var name = document.getElementById('name').value;
		var category = document.getElementById('category').value;
		var position = document.getElementById('position').value;
		var department = document.getElementById('department').value;
		var no_of_days = document.getElementById('no_of_days').value;
		var date_suspended = document.getElementById('date_suspended').value;
		var date_returned = document.getElementById('date_returned').value;
		var violation = document.getElementById('violation').value;
		var other_details = document.getElementById('other_details').value;
		var details = document.getElementById('details').value;
		var process = document.getElementById('process').value;
		var date_report_to_tc = document.getElementById('date_report_to_tc').value;
		var remarks = document.getElementById('remarks').value;
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				<!-- To Refresh Table -->
				search_all();
				clear_data();
			}
		};
		xhttp.open("GET", "AJAX/query_ir.php?operation=update_ir&&id_hidden="+id+"&&id_no="+id_no+"&&name="+name+"&&category="+category+"&&position="+position+"&&department="+department+"&&no_of_days="+no_of_days+"&&date_suspended="+date_suspended+"&&date_returned="+date_returned+"&&violation="+violation+"&&other_details="+other_details+"&&details="+details+"&&process="+process+"&&date_report_to_tc="+date_report_to_tc+"&&remarks="+remarks, true);
		xhttp.send();
	}
	function save_ir(){
		var id_no = document.getElementById('id_no').value;
		var name = document.getElementById('name').value;
		var category = document.getElementById('category').value;
		var position = document.getElementById('position').value;
		var department = document.getElementById('department').value;
		var no_of_days = document.getElementById('no_of_days').value;
		var date_suspended = document.getElementById('date_suspended').value;
		var date_returned = document.getElementById('date_returned').value;
		var violation = document.getElementById('violation').value;
		var other_details = document.getElementById('other_details').value;
		var details = document.getElementById('details').value;
		var process = document.getElementById('process').value;
		var date_report_to_tc = document.getElementById('date_report_to_tc').value;
		var remarks = document.getElementById('remarks').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				<!-- To Refresh Table -->
				search_all();
				clear_data();
			}
		};
		xhttp.open("GET", "AJAX/query_ir.php?operation=add_ir&&id_no="+id_no+"&&name="+name+"&&category="+category+"&&position="+position+"&&department="+department+"&&no_of_days="+no_of_days+"&&date_suspended="+date_suspended+"&&date_returned="+date_returned+"&&violation="+violation+"&&other_details="+other_details+"&&details="+details+"&&process="+process+"&&date_report_to_tc="+date_report_to_tc+"&&remarks="+remarks, true);
		xhttp.send();
	}
	function search_all(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_all", true);
		xhttp.send();
	}
	function search_ir(){
		var keyword = document.getElementById('Search').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_ir&&keyword="+keyword, true);
		xhttp.send();
	}
	function open_details(x){
		var split = x.split('~!~');
		var id = split[0];
		var id_no = split[1];
		var name = split[2];
		var category = split[3];
		var position = split[4];
		var department = split[5];
		var car_model = split[6];
		var no_of_days = split[7];
		var date_suspended = split[8];
		var date_returned = split[9];
		var violation = split[10];
		var details = split[11];
		var process = split[12];
		var date_report_tc = split[13];
		var remarks = split[14];
		if(violation == 'SOP'){
			document.getElementById('div_other_details').style.display="none";
		}else{
			var violation1 = violation;
			var violation = 'Others';
			document.getElementById('other_details').value = violation1;
			document.getElementById('div_other_details').style.display="inline-block";
		}
		document.getElementById('id_hidden').value = id;
		document.getElementById('id_no').value = id_no;
		document.getElementById('name').value = name;
		document.getElementById('category').value = category;
		document.getElementById('position').value = position;
		document.getElementById('department').value = department;
		//document.getElementById('car_model').value = car_model;
		document.getElementById('no_of_days').value = no_of_days;
		document.getElementById('date_suspended').value = date_suspended;
		document.getElementById('date_returned').value = date_returned;
		document.getElementById('violation').value = violation;
		document.getElementById('details').value = details;
		document.getElementById('process').value = process;
		document.getElementById('date_report_to_tc').value = date_report_tc;
		document.getElementById('remarks').value = remarks;
		document.getElementById('btn_update').style.display="inline-block";
		document.getElementById('btn_delete').style.display="inline-block";
		document.getElementById('btn_save').style.display="none";
		
		$("#Add_IR_Memo_Form").modal();
	}
	function clear_data(){
		document.getElementById('id_no').value = '';
		document.getElementById('name').value = '';
		document.getElementById('category').value = 'Category';
		document.getElementById('position').value = 'Position';
		document.getElementById('department').value = 'Department';
		document.getElementById('no_of_days').value = '';
		document.getElementById('date_suspended').value = '';
		document.getElementById('date_returned').value = '';
		document.getElementById('violation').value = 'Violation';
		document.getElementById('other_details').value = '';
		document.getElementById('details').value = '';
		document.getElementById('process').value = 'Process';
		document.getElementById('date_report_to_tc').value = '';
		document.getElementById('remarks').value = '';
		document.getElementById('div_other_details').style.display="none";
	}
	function clear_output(){
		document.getElementById('save_output').innerHTML="";
		var id_no = document.getElementById('id_no').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('dropdown_id_menu').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_id_no&&keyword="+id_no, true);
		xhttp.send();
	}
	function select_details(x){
		var split = x.split('~!~');
		var id_no = split[0];
		var name = split[1];
		var category = split[2];
		var department = split[3];
		var position = split[4];
		document.getElementById('id_no').value = id_no;
		document.getElementById('name').value = name;
		document.getElementById('category').value = category;
		document.getElementById('position').value = position;
		document.getElementById('department').value = department;
		document.getElementById('dropdown_id_menu').innerHTML = '';
	}
</script>
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- My JavaScript -->
<script type="text/javascript" src="myjs/nav.js"></script>
</body>
</html>
