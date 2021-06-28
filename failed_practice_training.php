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
	<title>Suspended Employees Monitoring System</title>
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
</head>
<body class="bg">
	<?php
		// This is for Navagation
		include 'Nav/header.php';
		// This is for Modal
		include 'Modal/practice_training_modal.php';
	?>
	<div class="card_opa">
		<br>
		<div class="row">
			<div class="md-form mb-0 col-sm-3">
				<input type="text" id="Search" class="form-control text-center ml-3" oninput="search_practice()">
				<label for="Search" id="Searh_Label" class="ml-3"> <i class="fas fa-search ml-3"></i> Search</label>
			</div>
			<div class="col-sm-9 d-flex justify-content-end">
				<button class="btn btn-default mt-3" onclick="download_excel()"><i class="fas fa-file-download"></i> Excel </button>
			</div>
		</div>
		<div class="col-sm-12 d-flex justify-content-center">
			<p class="h3 mt-2">Failed Practice Training</p>
		</div>
		<div class="col-sm-12">
			<table class="table table-bordered">
				<thead class="blue-grey lighten-4">
					<tr>
						<th><strong>ID No.:</strong></th>
						<th><strong>Name</strong></th>
						<th><strong>Category</strong></th>
						<th><strong>Position</strong></th>
						<th><strong>Department</strong></th>
						<th><strong>Process</strong></th>
						<th><strong>Practice Training</strong></th>
						<th><strong>Specific Process</strong></th>
					</tr>
				</thead>
				<tbody id="table_content">
				</tbody>
			</table>
		</div>
	</div>
<script>
	search_all();
	function search_all(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_practice.php?operation=search_all_failed", true);
		xhttp.send();
	}
	function search_practice(){
		var keyword = document.getElementById('Search').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_practice.php?operation=search_key_failed&&keyword="+keyword, true);
		xhttp.send();
	}
	function open_details(x){
		var split = x.split('~!~');
		var id_no = split[0];
		var id = split[1];
		//document.getElementById('result_section').style.display="inline-block";
		//document.getElementById('trainor_section').style.display="inline-block";
		document.getElementById('btn_save_status').style.display="none";
		document.getElementById('process_dropdown').style.display="none";
		document.getElementById('title_modal_head').innerHTML="Failed in Practice Training"; // To Change the Title on the Header of Modal
		document.getElementById('pt_section_result').value="Training Result";
		document.getElementById('name_trainor').value="";
		$("#For_Refresh_Training_Form").modal();
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('table_content_modal').innerHTML=response;
				document.getElementById('id_no_cc').value=id_no;
				document.getElementById('hidden_id_table').value=id;
			}
		};
		xhttp.open("GET", "AJAX/query_refresh.php?operation=search_details_sus&&id_no="+id_no, true);
		xhttp.send()
	}
	function open_on_large(x){
		var split = x.split('~!~');
		var id_no = split[0];
		var id = split[1];
		display_hidden_details();
		document.getElementById('show_hide_status').value='show';
		document.getElementById('show_hide_trigger').style.display='inline-block';
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				var split = response.split('~!~');
				var id = split[0];
				var id_no = split[1];
				var name = split[2];
				var category = split[3];
				var position = split[4];
				var department = split[5];
				var car_model = split[6];
				var no_of_days = split[7];
				var date_suspended_from = split[8];
				var date_suspended_to = split[9];
				var date_returned = split[10];
				var violation = split[11];
				var details = split[12];
				var process_final_initial = split[13];
				var practice_training = split[14];
				var process_under = split[15];
				var date_report_tc = split[16];
				var remarks = split[17];
				var id_uploaded_file = split[18];
				if(violation == 'SOP'){
					document.getElementById('other_details_section').style.display="none";
				}else{
					var violation1 = violation;
					var violation = 'Others';
					document.getElementById('other_details_cc').value = violation1;
					document.getElementById('other_details_section').style.display="inline-block";
				}
				document.getElementById('id_no_cc').value=id_no;
				document.getElementById('name_cc').value=name;
				document.getElementById('category_cc').value=category;
				document.getElementById('position_cc').value=position;
				document.getElementById('department_cc').value=department;
				document.getElementById('no_of_days_cc').value=no_of_days;
				document.getElementById('date_suspended_from_cc').value=date_suspended_from;
				document.getElementById('date_suspended_to_cc').value=date_suspended_to;
				document.getElementById('date_returned_cc').value=date_returned;
				document.getElementById('violation_cc').value=violation;
				document.getElementById('details_cc').value=details;
				document.getElementById('details_cc').value=details;
				document.getElementById('process_final_initial').value=process_final_initial;
				document.getElementById('practice_training').value=practice_training;
				document.getElementById('process_under1').value=process_under;
				document.getElementById('date_report_to_tc_cc').value=date_report_tc;
				document.getElementById('remarks_cc').value=remarks;
				load_practice1(process_final_initial,practice_training,process_under);
				get_ir_copy(id_no,id_uploaded_file);
			}
		};
		xhttp.open("GET", "AJAX/query_cc_search.php?operation=search_to_view_det&&id_no="+id_no+"&&id="+id, true);
		xhttp.send();
	}
	function get_ir_copy(x,y){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('scan_copy_section').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_copy.php?operation=ir_copy_cancellation&&id_no="+x+"&&ir_copy="+y, true);
		xhttp.send();
	}
	function display_hidden_details(){
		document.getElementById('suspension_title').style.display="inline-block";
		document.getElementById('id_no_section').style.display="inline-block";
		document.getElementById('name_section').style.display="inline-block";
		document.getElementById('category_section').style.display="inline-block";
		document.getElementById('position_section').style.display="inline-block";
		document.getElementById('department_cc').style.display="inline-block";
		document.getElementById('date_suspended_from_section').style.display="inline-block";
		document.getElementById('date_suspended_to_section').style.display="inline-block";
		document.getElementById('date_return_section').style.display="date_returned";
		document.getElementById('no_of_days_section').style.display="inline-block";
		document.getElementById('violation_section').style.display="inline-block";
		document.getElementById('details_section').style.display="inline-block";
		document.getElementById('process_section').style.display="inline-block";
		document.getElementById('practice_training_section').style.display="inline-block";
		document.getElementById('process_under_section1').style.display="inline-block";
		document.getElementById('date_report_tc_section').style.display="inline-block";
		document.getElementById('remarks_section').style.display="inline-block";
		document.getElementById('suspension_attachement_section').style.display="inline-block";
	}
	function display_none_details(){
		document.getElementById('suspension_title').style.display="none";
		document.getElementById('id_no_section').style.display="none";
		document.getElementById('name_section').style.display="none";
		document.getElementById('category_section').style.display="none";
		document.getElementById('position_section').style.display="none";
		document.getElementById('department_cc').style.display="none";
		document.getElementById('date_suspended_from_section').style.display="none";
		document.getElementById('date_suspended_to_section').style.display="none";
		document.getElementById('date_return_section').style.display="none";
		document.getElementById('no_of_days_section').style.display="none";
		document.getElementById('violation_section').style.display="none";
		document.getElementById('other_details_section').style.display="none";
		document.getElementById('details_section').style.display="none";
		document.getElementById('process_section').style.display="none";
		document.getElementById('practice_training_section').style.display="none";
		document.getElementById('process_under_section1').style.display="none";
		document.getElementById('date_report_tc_section').style.display="none";
		document.getElementById('remarks_section').style.display="none";
		document.getElementById('suspension_attachement_section').style.display="none";
		document.getElementById('process_under_section').style.display="none";
		document.getElementById('pt_section').style.display="none";
		document.getElementById('date_training_section').style.display="none";
		//document.getElementById('trainor_section').style.display="none";
		//document.getElementById('result_section').style.display="none";
	}
	function close_modal(){
		$('#For_Refresh_Training_Form').modal('toggle');
		display_none_details();
		document.getElementById('show_hide_trigger').style.display='none';
		document.getElementById('output_ajax').innerHTML="";
	}
	function show_less(){
		var status = document.getElementById('show_hide_status').value;
		if(status == 'show'){
			document.getElementById('show_hide_status').value='hidden';
			display_none_details();
		}else{
			document.getElementById('show_hide_status').value='show';
			display_hidden_details();
		}
		
	}
	function btn_save_status_function(){
		var id_no = document.getElementById('id_no_cc').value;
		var id = document.getElementById('hidden_id_table').value;
		var pt_section_result = document.getElementById('pt_section_result').value;
		var name_trainor = document.getElementById('name_trainor').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_ajax').innerHTML=response;
				search_all();
			}
		};
		xhttp.open("GET", "AJAX/save_practice.php?operation=update_result&&id_no="+id_no+"&&id="+id+"&&pt_section_result="+pt_section_result+"&&name_trainor="+name_trainor, true);
		xhttp.send()
	}
	function download_excel(){
		window.open("AJAX/download_excel/failed_practice_training.php" , '_blank');
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
<!-- My JavaScript for Realtime Notification-->
<script type="text/javascript" src="myjs/realtime_notification.js"></script>
</body>
</html>
