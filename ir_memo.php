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
	<link href="mycss/loader.css" rel="stylesheet">
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
		include 'Modal/create_ir_modal.php';
	?>
	<div class="ml-auto mr-auto card_opa">
		<br>
		<div class="row ml-0 mr-0">
			<div class="md-form mb-0 col-sm-3">
				<input type="text" id="Search" class="form-control text-center ml-3" onchange="search_ir()">
				<label for="Search" id="Sear_Label" class="ml-3"> <i class="fas fa-search ml-3"></i> Search</label>
			</div>
			<div class="md-form mb-0 col-sm-3">
				<select id="search_by" class="browser-default form-control">
				  <option selected>Search By</option>
				  <option value="ID">ID</option>
				  <option value="Name">Name</option>
				  <option value="Category">Category</option>
				  <option value="Position">Position</option>
				  <option value="Date Suspended From">Date Suspended From</option>
				  <option value="Date Suspended To">Date Suspended To</option>
				  <option value="Date Returned To">Date Returned To</option>
				  <option value="Process">Process</option>
				</select>
			</div>
			<div class="col-sm-6 d-flex justify-content-end" style="cursor:pointer;">
				<input type="hidden" id="year_filter_hidden">
				<button class="btn btn-default dropdown-toggle mt-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-calendar-alt"></i> Filter by Year</button>
				<input type="hidden" id="limiter_status">
				<div class="dropdown-menu default-color mt-0" style="width:190px;" id="all_years">
				</div>
				<button class="btn btn-default mt-3" onclick="download_excel()"><i class="fas fa-file-download"></i> Excel </button>
				<button class="btn btn-default mt-3" onclick="modal_action()" id="btn_add_ir/memo" ><i class="fas fa-plus"></i> Add IR/Memo </button>
			</div>
			<div class="col-sm-12 d-flex justify-content-center">
				<p class="h3">Incident Report</p>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered card_opa table-sm bs-select">
					<thead class="blue-grey lighten-4">
						<tr>
							<th><strong>ID No.:</strong></th>
							<th><strong>Name</strong></th>
							<th><strong>Category</strong></th>
							<!--th><strong>Position</strong></th-->
							<th><strong>Department</strong></th>
							<th><strong>Car Model</strong></th>
							<th><strong>No. of Days</strong></th>
							<th><strong>Suspended From</strong></th>
							<th><strong>Suspended To</strong></th>
							<th><strong>Date Returned</strong></th>
							<th><strong>Violation</strong></th>
							<th><strong>Process</strong></th>
							<th><strong>Details</strong></th>
							<th><strong>Remarks</strong></th>
						</tr>
					</thead>
					<tbody id="table_content">
					</tbody>
				</table>
				<!--div class="rounded-circle default-color card-img-100 mx-auto mb-1 pulse" style="margin-top:-10px;width:50px;height:50px;cursor:pointer;" onclick="load_more_ir()" id="load_btn">
					<i class="text-white fas fa-redo" style="margin-left:17px;margin-top:17px;"></i-->
					<input type="hidden" id="load_more_count_ir" value="0">
				<!--/div-->
			</div>
		</div>
	</div>
<script>
	<!-- To Display Data in the Table -->
	search_all();
	year_filter();
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
				setTimeout(close_modal, 1000);
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
		var car_model = document.getElementById('car_model').value;
		var no_of_days = document.getElementById('no_of_days').value;
		var date_suspended_from = document.getElementById('date_suspended_from').value;
		var date_suspended_to = document.getElementById('date_suspended_to').value;
		var date_returned = document.getElementById('date_returned').value;
		var violation = document.getElementById('violation').value;
		var other_details = document.getElementById('other_details').value;
		var details = document.getElementById('details').value;
		var process_final_initial = document.getElementById('process_final_initial').value;
		var practice_training = document.getElementById('practice_training').value;
		var process_under = document.getElementById('process_under').value;
		var date_report_to_tc = document.getElementById('date_report_to_tc').value;
		var remarks = document.getElementById('remarks').value;
		var id_uploaded_file = document.getElementById('id_uploaded_file').value;
		var car_model_line = document.getElementById('car_model_line').value;
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				<!-- To Refresh Table -->
				search_all();
				clear_data();
				setTimeout(close_modal, 1000);
			}
		};
		xhttp.open("GET", "AJAX/query_ir.php?operation=update_ir&&id_hidden="+id+"&&id_no="+id_no+"&&name="+name+"&&category="+category+"&&position="+position+"&&department="+department+"&&car_model="+car_model+"&&no_of_days="+no_of_days+"&&date_suspended_from="+date_suspended_from+"&&date_suspended_to="+date_suspended_to+"&&date_returned="+date_returned+"&&violation="+violation+"&&other_details="+other_details+"&&details="+details+"&&process_final_initial="+process_final_initial+"&&practice_training="+practice_training+"&&process_under="+process_under+"&&date_report_to_tc="+date_report_to_tc+"&&remarks="+remarks+"&&id_uploaded_file="+id_uploaded_file+"&&car_model_line="+car_model_line, true);
		xhttp.send();
	}
	function save_ir(){
		var id_no = document.getElementById('id_no').value;
		var name = document.getElementById('name').value;
		var category = document.getElementById('category').value;
		var position = document.getElementById('position').value;
		var department = document.getElementById('department').value;
		var no_of_days = document.getElementById('no_of_days').value;
		var date_suspended_from = document.getElementById('date_suspended_from').value;
		var date_suspended_to = document.getElementById('date_suspended_to').value;
		var date_returned = document.getElementById('date_returned').value;
		var violation = document.getElementById('violation').value;
		var other_details = document.getElementById('other_details').value;
		var details = document.getElementById('details').value;
		var process_final_initial = document.getElementById('process_final_initial').value;
		var practice_training = document.getElementById('practice_training').value;
		var process_under = document.getElementById('process_under').value;
		var car_model = document.getElementById('car_model').value;
		var date_report_to_tc = document.getElementById('date_report_to_tc').value;
		var remarks = document.getElementById('remarks').value;
		var id_uploaded_file = document.getElementById('id_uploaded_file').value;
		var car_model_line = document.getElementById('car_model_line').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				<!-- To Refresh Table -->
				search_all();
				clear_data();
				setTimeout(close_modal, 1000);
			}
		};
		xhttp.open("GET", "AJAX/query_ir.php?operation=add_ir&&id_no="+id_no+"&&name="+name+"&&category="+category+"&&position="+position+"&&department="+department+"&&car_model="+car_model+"&&no_of_days="+no_of_days+"&&date_suspended_from="+date_suspended_from+"&&date_suspended_to="+date_suspended_to+"&&date_returned="+date_returned+"&&violation="+violation+"&&other_details="+other_details+"&&details="+details+"&&process_final_initial="+process_final_initial+"&&practice_training="+practice_training+"&&process_under="+process_under+"&&date_report_to_tc="+date_report_to_tc+"&&remarks="+remarks+"&&id_uploaded_file="+id_uploaded_file+"&&car_model_line="+car_model_line, true);
		xhttp.send();
	}
	function load_more_ir(){
		var limiter = document.getElementById('load_more_count_ir').value;
		var limiter_status = document.getElementById('year_filter_hidden').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var count = parseInt(limiter) + 20;
				document.getElementById('load_more_count_ir').value=count;				
				document.getElementById('table_content').innerHTML=response;
				if(limiter_status != ''){
					count_all_ir_filter(limiter_status);
				}else{
					count_search_ir();
					//count_all_ir_filter(x); OLD
				}
			}
		};
		if(limiter_status != '' ){
			var year=document.getElementById('year_filter_hidden').value;
			var keyword = document.getElementById('Search').value;
			xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_ir&&keyword="+keyword+"&&year="+year+"&&limiter="+limiter, true);
			xhttp.send();
		}else{
			xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_all&&limiter="+limiter, true);
			xhttp.send();
		}
		
	}
	function search_all(){
		var limiter = document.getElementById('load_more_count_ir').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;	
				var count = parseInt(limiter) + 20;
				document.getElementById('load_more_count_ir').value=count;					
				document.getElementById('table_content').innerHTML=response;
				count_all_ir();
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_all&&limiter="+limiter, true);
		xhttp.send();
	}
	function year_filter(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('all_years').innerHTML=response;
				//document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=year_filter", true);
		xhttp.send();
	}
	function filter_by_year(x){
		document.getElementById('load_more_count_ir').value=20;
		document.getElementById('Search').value='';
		document.getElementById('year_filter_hidden').value=x;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;			
				document.getElementById('table_content').innerHTML=response;
				count_all_ir_filter(x);
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=filter_by_year&&year="+x+"&&limiter=0", true);
		xhttp.send();
	}
	function search_ir(){
		var limiter = document.getElementById('load_more_count_ir').value=0;
		var search_by = document.getElementById('search_by').value;
		var keyword = document.getElementById('Search').value;
		var year = document.getElementById('year_filter_hidden').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;	
				var count = parseInt(limiter) + 20;
				document.getElementById('load_more_count_ir').value=count;						
				document.getElementById('table_content').innerHTML=response;
				count_search_ir();
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_ir&&keyword="+keyword+"&&year="+year+"&&limiter=0&search_by="+search_by, true);
		xhttp.send();
	}
	function count_all_ir(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				var load_count = document.getElementById('load_more_count_ir').value;
				var response = parseInt(response);
				var load_count = parseInt(load_count);
				if(load_count > response){
					//document.getElementById('load_btn').style.display="none";
				}else{
					//document.getElementById('load_btn').style.display="block";
				}
			}
		};
		xhttp.open("GET", "AJAX/count.php?operation=search_all", true);
		xhttp.send();
	}
	function count_all_ir_filter(x){
		document.getElementById('year_filter_hidden').value=x;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				var load_count = document.getElementById('load_more_count_ir').value;
				var reponse = parseInt(response);
				var load_count = parseInt(load_count);
				if(load_count == 0){
					var load_count = 20;
					if(load_count > response){
						//document.getElementById('load_btn').style.display="none";
					}else{
						//document.getElementById('load_btn').style.display="block";
					}
				}else if(load_count > 0){
					var load_count = load_count;
					if(load_count > response){
						//document.getElementById('load_btn').style.display="none";
					}else{
						//document.getElementById('load_btn').style.display="block";
					}
				}				
			}
		};
		xhttp.open("GET", "AJAX/count.php?operation=filter_by_year&&year="+x, true);
		xhttp.send();
	}
	function count_search_ir(){
		var keyword = document.getElementById('Search').value;
		var year = document.getElementById('year_filter_hidden').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var load_count = document.getElementById('load_more_count_ir').value;
				var response = parseInt(response);
				var load_count = parseInt(load_count);
				if(load_count > response){
					//document.getElementById('load_btn').style.display = "none";
				}else{
					//document.getElementById('load_btn').style.display = "block";
				}	
			}
		};
		xhttp.open("GET", "AJAX/count.php?operation=search_ir&&keyword="+keyword+"&&year="+year, true);
		xhttp.send();
	}
	function open_details(x){
		clear_data();
		var split = x.split('~!~');
		var id = split[0];
		var id_no = split[1];
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
				var car_model = split[18];
				var id_uploaded_file = split[19];
				var car_model_line = split[20];
				var car_model_line = parseInt(car_model_line);
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
				document.getElementById('car_model').value = car_model;
				//document.getElementById('car_model').value = car_model;
				document.getElementById('no_of_days').value = no_of_days;
				document.getElementById('date_suspended_from').value = date_suspended_from;
				document.getElementById('date_suspended_to').value = date_suspended_to;
				document.getElementById('date_returned').value = date_returned;
				document.getElementById('violation').value = violation;
				document.getElementById('details').value = details;
				document.getElementById('process_final_initial').value = process_final_initial;
				document.getElementById('date_report_to_tc').value = date_report_tc;
				document.getElementById('car_model_line').value = car_model_line;
				document.getElementById('remarks').value = remarks;
				document.getElementById('btn_update').style.display="inline-block";
				document.getElementById('btn_delete').style.display="inline-block";
				document.getElementById('date_report_section').style.display="inline-block";
				document.getElementById('btn_save').style.display="none";
				document.getElementById('id_no').disabled=true;
				$("#Add_IR_Memo_Form").modal();
				load_practice1(process_final_initial,practice_training,process_under);
				get_ir_copy(id_no,id_uploaded_file);
				load_specific_line(car_model,car_model_line);
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=open_details_modal&&id="+id+"&id_no="+id_no, true);
		xhttp.send();
	}
	function get_ir_copy(x,y){
		document.getElementById('id_uploaded_file').value=y;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('all_files').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_copy.php?operation=ir_copy_ir_add&&id_no="+x+"&&ir_copy="+y, true);
		xhttp.send();
	}
	function clear_data(){
		document.getElementById('id_no').value = '';
		document.getElementById('name').value = '';
		document.getElementById('category').value = 'Category';
		document.getElementById('position').value = 'Position';
		document.getElementById('department').value = 'Department';
		document.getElementById('no_of_days').value = '';
		document.getElementById('date_suspended_from').value = '';
		document.getElementById('date_suspended_to').value = '';
		document.getElementById('date_returned').value = '';
		document.getElementById('violation').value = 'SOP';
		document.getElementById('other_details').value = '';
		document.getElementById('details').value = '';
		document.getElementById('process_final_initial').value = 'Process';
		document.getElementById('date_report_to_tc').value = '';
		document.getElementById('remarks').value = '';
		document.getElementById('div_other_details').style.display="none";
		document.getElementById('date_report_section').style.display="none";
		document.getElementById('violation_count').innerHTML='';
		document.getElementById('uploaded_scan_file_section').innerHTML='';
		document.getElementById('all_files').innerHTML='';
		document.getElementById('id_no').disabled=false;
	}
	function close_modal(){
		$('#Add_IR_Memo_Form').modal('toggle');
		document.getElementById('save_output').innerHTML='';
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
		find_violation();
	}
	function find_violation(){
		var id_no = document.getElementById('id_no').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('violation_count').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=find_violation&&keyword="+id_no, true);
		xhttp.send();
	}
	function get_all_files_uploaded(x){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('uploaded_scan_file_section').innerHTML=response;
				//alert(response);
			}
		};
		xhttp.open("GET", "AJAX/all_uploaded_files.php?operation=get_all&&keyword="+x, true);
		xhttp.send();
	}
	function delete_uploaded_file(x){
		var split = x.split('~!~');
		var id_files = split[0];
		var id = split[1];
		var id_no = split[2];
		var location = split[3];
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				//alert(response);
				get_all_files_uploaded(id_files);
				//document.getElementById('uploaded_scan_file_section').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/all_uploaded_files.php?operation=delete_one_file&id_files="+id_files+"&id="+id+"&id_no="+id_no+"&location="+location, true);
		xhttp.send();
	}
	function download_excel(){
		var keyword = document.getElementById('Search').value;
		var year=document.getElementById('year_filter_hidden').value;
		window.open("AJAX/download_excel/ir_memo_report.php?keyword="+keyword+"&&year="+year, '_blank');
	}
</script>
<!-- For upload Files -->
<script type="text/javascript">
    function upload(){
        var form_data = new FormData();
		var id_no = document.getElementById('id_no').value;
		var id_uploaded_file = document.getElementById('id_uploaded_file').value;
        var ins = document.getElementById('scan_file').files.length;
		for (var x = 0; x < ins; x++) {
            form_data.append("upload[]", document.getElementById('scan_file').files[x]);
        }
        $.ajax({
            url: 'AJAX/upload_scanned_file.php?id_no='+id_no+"&id_uploaded_file="+id_uploaded_file, // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
			success: function (response){
            $('#id_uploaded_file').val(response); // display success response from the PHP script
			if(id_uploaded_file != ''){
				document.getElementById('all_files').innerHTML='';
			}
			get_all_files_uploaded(response);
            },
            error: function (response) {
            $('#msg').html(response); // display error response from the PHP script
            }
        });
	}
</script>
<!-- The JavaScript Below is for the user restriction and disabling the buttons and the Internal Links -->
<script>
	var role_assign = '<?php echo $_SESSION["role_assign"];?>';
	if(role_assign == 'HRD-RTS-Office'){
		document.getElementById("refresh_training_page_toggle").disabled = true;
		document.getElementById("practice_training_page_toggle").disabled = true;
		var el = document.getElementById("cancel_certificate_page_toggle");
		if ( !el.onclick ) {
        el.onclick = function() { return false; };
		} else {
			el.onclick = function() { return true; };
		}
	}else if(role_assign == 'HRD-RTS-Training'){
		document.getElementById("btn_add_ir/memo").disabled = true;
		document.getElementById("btn_save").disabled = true;
		document.getElementById("btn_update").disabled = true;
		document.getElementById("btn_delete").disabled = true;
		document.getElementById("scan_file").disabled = true;
	}
</script>
<script>
	window.onscroll = function(ev){
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
       load_more_ir();
    }
};
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
<!-- My JavaScript for Clicking the Content of Notification-->
<script type="text/javascript" src="myjs/notification_content.js"></script>
</body>
</html>
