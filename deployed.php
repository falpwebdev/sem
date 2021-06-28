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
		// This is for Modal
		include 'Modal/add_employee.php';
	?>
	<div class="card_opa ml-0 mr-0">
		<br>
		<div class="row ml-0 mr-0">
			<div class="md-form mb-0 col-sm-3">
				<input type="text" id="Search" class="form-control text-center ml-3" oninput="search_employee()">
				<label for="Search" id="Searh_Label" class="ml-3"> <i class="fas fa-search ml-3"></i> Search</label>
			</div>
			<div class="col-sm-9 d-flex justify-content-end">
				<form method="post" action="import/ExcelUpload.php" enctype="multipart/form-data">
				<div id="loader_section" style="font-size:30px;">
				</div>
				<div>
					<span class="btn btn-default mt-3 btn-file" id="scan_file_btn">
						<i class="fas fa-file-upload"></i> <label class="mt-1" id="loading_indicator"> Bulk Upload</label><input type="file" id="file" name="file" onchange="bulk_upload()" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
					</span>
				</div>
				</form>
				<button class="btn btn-default mt-3"><i class="fas fa-file-download"></i><a href="AJAX/download_excel/all_employed.php" class="text-white"> Download All</a></button>
				<button class="btn btn-default mt-3"><i class="fas fa-file-download"></i><a href="Format/deployed.csv" class="text-white" download> Download Format</a></button>
				<button class="btn btn-default mt-3" onclick="add_employee_modal()"><i class="fas fa-plus"></i> Add Employee </button>
			</div>
			<div class="col-sm-12 d-flex justify-content-center">
				<p class="h3">List of Employee</p>
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered" >
					<thead class="blue-grey lighten-4">
						<tr>
							<th><strong>ID No.:</strong></th>
							<th><strong>Name</strong></th>
							<th><strong>Category</strong></th>
							<th><strong>Position</strong></th>
							<th><strong>Department</strong></th>
							<th><strong>Batch No.</strong></th>
							<th><strong>Date Deployed</strong></th>
							<th><strong>Remarks</strong></th>
						</tr>
					</thead>
					<tbody id="table_content" style="overflow: auto;">
					</tbody>
				</table>
				<!--div class="rounded-circle default-color card-img-100 mx-auto mb-1 pulse" style="margin-top:-10px;width:50px;height:50px;cursor:pointer;" onclick="load_more_employee()">
					<i class="text-white fas fa-redo" style="margin-left:17px;margin-top:17px;"></i-->
					<input type="hidden" id="load_more_count_employee" value="0">
				<!--/div-->
			</div>
		</div>
		<br>
		<br>
	</div>
<script>
	load_all();
	function add_employee_modal(){
		$('#Add_Employee_Form').modal('toggle');
		hide_button();
		clear();
		document.getElementById("id_no").disabled = false;
	}
	function load_all(){
		var limiter = document.getElementById('load_more_count_employee').value;
		var xhttp;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var count = parseInt(limiter) + 20;
				document.getElementById('load_more_count_employee').value=count;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_deployed.php?operation=load_all&&limiter="+limiter, true);
		xhttp.send();
	}
	function search_employee(){
		var limiter = document.getElementById('load_more_count_employee').value;
		var keyword = document.getElementById('Search').value;
		var xhttp;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_deployed.php?operation=search_employee&&keyword="+keyword+"&&limiter="+limiter, true);
		xhttp.send();
	}
	function search_id_no_add(){
		var keyword = document.getElementById('id_no').value;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				if(response != ''){
					document.getElementById('id_no_Label').innerHTML='ID No. is Allready Used';
					document.getElementById('btn_save').disabled = true;
				}else{
					document.getElementById('id_no_Label').innerHTML='ID No.:';
					document.getElementById('btn_save').disabled = false;
				}
				//alert(response);
				//document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_deployed.php?operation=search_id_no_add&&keyword="+keyword, true);
		xhttp.send();
	}
	function save_employee(){
		var id_no = document.getElementById('id_no').value;
		var name = document.getElementById('name').value;
		var category = document.getElementById('category').value;
		var position = document.getElementById('position').value;
		var department = document.getElementById('department').value;
		var date_deployed = document.getElementById('date_deployed').value;
		var batch_no = document.getElementById('batch_no').value;
		var remarks = document.getElementById('remarks').value;
		var xhttp;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				load_all();
			}
		};
		xhttp.open("GET", "AJAX/query_deployed.php?operation=add_employee&&id_no="+id_no+"&&name="+name+"&&category="+category+"&&position="+position+"&&department="+department+"&&date_deployed="+date_deployed+"&&batch_no="+batch_no+"&&remarks="+remarks, true);
		xhttp.send();
	}
	function update_employee(){
		var id_no = document.getElementById('id_no').value;
		var name = document.getElementById('name').value;
		var category = document.getElementById('category').value;
		var position = document.getElementById('position').value;
		var department = document.getElementById('department').value;
		var date_deployed = document.getElementById('date_deployed').value;
		var batch_no = document.getElementById('batch_no').value;
		var remarks = document.getElementById('remarks').value;
		var xhttp;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				load_all();
			}
		};
		xhttp.open("GET", "AJAX/query_deployed.php?operation=update_employee&&id_no="+id_no+"&&name="+name+"&&category="+category+"&&position="+position+"&&department="+department+"&&date_deployed="+date_deployed+"&&batch_no="+batch_no+"&&remarks="+remarks, true);
		xhttp.send();
	}
	function delete_employee(){
		var id_no = document.getElementById('id_no').value;
		var xhttp;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('save_output').innerHTML=response;
				load_all();
			}
		};
		xhttp.open("GET", "AJAX/query_deployed.php?operation=delete_employee&&id_no="+id_no, true);
		xhttp.send();
	}
	function open_on_modal(x){
		$('#Add_Employee_Form').modal('toggle');
		clear();
		show_button();
		var split = x.split('~!~');
		var id_no = split[0];
		var name = split[1];
		var category = split[2];
		var position = split[3];
		var department = split[4];
		var date_deployed = split[5];
		var batch_no = split[6];
		document.getElementById("id_no").disabled = true;
		document.getElementById('id_no').value=id_no;
		document.getElementById('name').value=name;
		document.getElementById('category').value=category;
		document.getElementById('position').value=position;
		document.getElementById('department').value=department;
		document.getElementById('date_deployed').value=date_deployed;
		document.getElementById('batch_no').value=batch_no;
	}
	function show_button(){
		document.getElementById('btn_update').style.display="inline-block";
		document.getElementById('btn_delete').style.display="inline-block";
		document.getElementById('btn_save').style.display="none";
		
	}
	function hide_button(){
		document.getElementById('btn_update').style.display="none";
		document.getElementById('btn_delete').style.display="none";
		document.getElementById('btn_save').style.display="inline-block";
	}
	function clear(){
		document.getElementById('save_output').innerHTML='';
		document.getElementById('id_no').value='';
		document.getElementById('name').value='';
		document.getElementById('category').value='Category';
		document.getElementById('position').value='Position';
		document.getElementById('department').value='Department';
		document.getElementById('date_deployed').value='';
		document.getElementById('batch_no').value='';
	}
	function load_more_employee(){
		var limiter = document.getElementById('load_more_count_employee').value;
		var keyword = document.getElementById('Search').value;
		var xhttp;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		} else {
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				var count = parseInt(limiter) + 20;
				document.getElementById('load_more_count_employee').value=count;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		if(keyword !='' ){
			xhttp.open("GET", "AJAX/query_deployed.php?operation=search_employee&&limiter="+limiter+"&keyword="+keyword, true);
			xhttp.send();
		}else{
			xhttp.open("GET", "AJAX/query_deployed.php?operation=load_all&&limiter="+limiter+"&keyword="+keyword, true);
			xhttp.send();
		}
	}
</script>
<script>
	window.onscroll = function(ev){
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
		//var a = window.innerHeight;
		//var y = window.scrollY;
		//	var c = document.body.offsetHeight;
		//	var z = a + y;
       //alert(a);
		//   alert(c);
	   load_more_employee();
    }
};
</script>
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
	}
</script>
<!-- For upload Files -->
<script type="text/javascript">
    function bulk_upload(){
		document.getElementById('loading_indicator').innerHTML=' Uploading....';
		//document.getElementById('scan_file_btn').innerHTML='<i class="fas fa-spinner"></i> Uploading <input type="file" id="file" name="file" onchange="bulk_upload()" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">';
        var form_data = new FormData();
        var ins = document.getElementById('file').files.length;
		for (var x = 0; x < ins; x++) {
            form_data.append("file", document.getElementById('file').files[x]);
        }
        $.ajax({
            url: 'import/excelUpload.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
			success: function (response){
            //$('#sam').innerHTML(response); // display success response from the PHP script
			//alert(response);
			if(response == 'uploaded'){
				document.getElementById('loading_indicator').innerHTML=' Bulk Upload';
				load_all();
			}
            },
            error: function (response) {
            $('#msg').html(response); // display error response from the PHP script
            }
        });
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
<!-- My JavaScript for Clicking the Content of Notification-->
<script type="text/javascript" src="myjs/notification_content.js"></script>
</body>
</html>
