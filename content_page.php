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
	<style>
		.view img{
			opacity:0.4;
		}
	</style>
</head>
<body class="bg">
	<?php
		// This is for Navagation
		include 'Nav/header.php';
	?>
	<br>
	<div class="card_opa">
		<div class="row">
			<div class="rows col-sm-2">
				<div class="view mb-1" onclick="open_category()">
					<img src="Images/category.jpg" class="img-fluid" alt="placeholder">
					<div class="mask flex-center waves-effect waves-light rgba-teal-slight">
						<div class="card_opa col-sm-12 text-center">
							<p class="h5 mt-3 mb-3 "> <strong> Category </strong></p>
						</div>
					</div>
				</div>
				<div class="view mb-1" onclick="open_position()">
					<img src="Images/Department.jpg" class="img-fluid" alt="placeholder">
					<div class="mask flex-center waves-effect waves-light rgba-teal-slight">
						<div class="card_opa col-sm-12 text-center">
							<p class="h5 mt-3 mb-3"> <strong> Position </strong> </p>
						</div>
					</div>
				</div>
				<div class="view mb-1" onclick="open_department()">
					<img src="Images/Position.jpg" class="img-fluid" alt="placeholder">
					<div class="mask flex-center waves-effect waves-light rgba-teal-slight">
						<div class="card_opa col-sm-12 text-center">
							<p class="h5 mt-3 mb-3"> <strong> Department </strong> </p>
						</div>
					</div>
				</div>
				<div class="view mb-1" onclick="open_process()">
					<img src="Images/process.jpg" class="img-fluid" alt="placeholder">
					<div class="mask flex-center waves-effect waves-light rgba-teal-slight">
						<div class="card_opa col-sm-12 text-center">
							<p class="h5 mt-3 mb-3"> <strong> Process </strong></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row col-sm-10">
				<div class="col-sm-6 border border-light">
					<br>
					<div class="text-center">
						<label class="h5" id="title_category"><strong> List of Categories </strong></label>
						<label class="h5" id="title_position" style="display:none;"><strong> List of Position </strong></label>
						<label class="h5" id="title_department" style="display:none;"><strong> List of Department </strong></label>
						<label class="h5" id="title_process" style="display:none;"><strong> List of Process </strong></label>
					</div>
					<table class="table table-bordered" id="all_table">
						<thead>
							<tr>
								<th><strong>ID:</strong></th>
								<th><strong>Category</strong></th>
							</tr>
						</thead>
						<tbody id="table_content_all">
						</tbody>
					</table>
					<div class="text-center">
						<label class="h5" id="title_process_pt" style="display:none;"></label>
					</div>
					<table class="table table-bordered" id="process_table">
						<tbody id="process_table_content">
						</tbody>
					</table>
					<div class="text-center">
						<label class="h5" id="title_process_specific" style="display:none;"></label>
					</div>
					<table class="table table-bordered" id="process_table_specific">
						<tbody id="process_table_specific_content">
						</tbody>
					</table>
				</div>
				<div class="col-sm-6 border border-light" id="for_category_section">
					<input type="hidden" id="id_category" class="form-control text-center font-weight-bolder">
					<div class="md-form mb-0 col-sm-7">
						<input type="text" id="name_category" class="form-control text-center font-weight-bolder">
						<label for="name_category" id="name_cagtegoy_Label" class="ml-3 font-weight-bolder">Category:</label>
					</div>
					<div class="col-sm-10">
						<button class="btn btn-default" id="save_category" onclick="save_category_action()"> Save <i class="fas fa-paper-plane"></i> </button>
						<button class="btn btn-default" id="update_category" style="display:none;" onclick="update_category_action()"> Update <i class="fas fa-edit"></i> </button>
						<button class="btn btn-default" id="delete_category" style="display:none;" onclick="delete_category_action()"> Delete <i class="fas fa-trash"></i> </button>
						<div class="col-sm-10">
							<label class="ml-1" id="output_category"></label>
						</div>
					</div>
				</div>
				<div class="col-sm-6 border border-light" id="for_position_department" style="display:none;">
					<input type="hidden" id="id_position" class="form-control text-center font-weight-bolder">
					<div class="md-form mb-0 col-sm-7">
						<input type="text" id="name_position" class="form-control text-center font-weight-bolder">
						<label for="name_position" id="name_position_Label" class="ml-3 font-weight-bolder">Position:</label>
					</div>
					<div class="col-sm-10">
						<button class="btn btn-default" id="save_position" onclick="save_position_action()"> Save <i class="fas fa-paper-plane"></i> </button>
						<button class="btn btn-default" style="display:none;" id="update_position" onclick="update_position_action()"> Update <i class="fas fa-edit"></i> </button>
						<button class="btn btn-default" style="display:none;" id="delete_position" onclick="delete_position_action()"> Delete <i class="fas fa-trash"></i> </button>
						<div class="col-sm-10">
							<label class="ml-1" id="output_position"></label>
						</div>
					</div>
				</div>
				<div class="col-sm-6 border border-light" id="for_department_section" style="display:none;">
					<input type="hidden" id="id_department" class="form-control text-center font-weight-bolder">
					<div class="md-form mb-0 col-sm-7">
						<input type="text" id="name_department" class="form-control text-center font-weight-bolder">
						<label for="name_department" id="name_department_Label" class="ml-3 font-weight-bolder">Department:</label>
					</div>
					<div class="col-sm-10">
						<button class="btn btn-default" id="save_department" onclick="save_department_action()"> Save <i class="fas fa-paper-plane"></i> </button>
						<button class="btn btn-default" style="display:none;" id="update_department" onclick="update_department_action()"> Update <i class="fas fa-edit"></i> </button>
						<button class="btn btn-default" style="display:none;" id="delete_department" onclick="delete_department_action()"> Delete <i class="fas fa-trash"></i> </button>
						<div class="col-sm-10">
							<label class="ml-1" id="output_department"></label>
						</div>
					</div>
				</div>
				<div class="col-sm-6 border border-light" id="for_process_section" style="display:none;">
					<input type="hidden" id="id_process" class="form-control text-center font-weight-bolder">
					<div class="md-form mb-0 col-sm-7">
						<select id="process_final_initial" class="browser-default form-control" onchange="load_practice()">
							<option selected>Process</option>
							<option value="Initial Process">Initial Process</option>
							<option value="Final Process">Final Process</option>
						</select>
					</div>
					<div class="md-form mb-0 col-sm-7">
						<select id="practice_training" class="browser-default form-control">
							<option selected>Practice Training</option>
						</select>
					</div>
					<div class="md-form mb-0 col-sm-7">
						<input type="text" id="name_process" class="form-control text-center font-weight-bolder">
						<label for="name_process" id="name_process_Label" class="ml-3 font-weight-bolder">Process:</label>
					</div>
					<div class="col-sm-10">
						<button class="btn btn-default" id="save_process" onclick="save_process_action()"> Save <i class="fas fa-paper-plane"></i> </button>
						<button class="btn btn-default" style="display:none;" id="update_process" onclick="update_process_action()"> Update <i class="fas fa-edit"></i></i> </button>
						<button class="btn btn-default" style="display:none;" id="delete_process" onclick="delete_process_action()"> Delete <i class="fas fa-trash"></i> </button>
						<div class="col-sm-10">
							<label class="ml-1" id="output_process"></label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include 'Nav/footer.php';
	?>
<script>
	get_category();
	function get_category(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('table_content_all').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/get_content.php?operation=category", true);
		xhttp.send();
	}
	function get_position(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('table_content_all').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/get_content.php?operation=position", true);
		xhttp.send();
	}
	function get_department(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('table_content_all').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/get_content.php?operation=department", true);
		xhttp.send();
	}
	function get_process(x){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('title_process_pt').style.display='inline-block';
				document.getElementById('title_process_pt').innerHTML="<strong>"+ x +"</strong>";
				document.getElementById('process_table').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/get_content.php?operation=process&&pt="+x, true);
		xhttp.send();
	}
	function get_content_for_specific(x){
		var split = x.split('~!~');
		var p = split[0];
		var pt = split[1];
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				document.getElementById('title_process_specific').style.display='inline-block';
				document.getElementById('title_process_specific').innerHTML="<strong>Specific Process</strong>";
				document.getElementById('process_table_specific_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/get_content.php?operation=process_all_by_pt&&pt="+pt+"&p="+p, true);
		xhttp.send();
	}
	function get_this(x){
		var split = x.split('~!~');
		var operation = split[2];
		if(operation == 'category'){
			document.getElementById('id_category').value=split[0];
			document.getElementById('name_category').value=split[1];
			document.getElementById('save_category').style.display='none';
			document.getElementById('update_category').style.display='inline-block';
			document.getElementById('delete_category').style.display='inline-block';
			document.getElementById('output_category').innerHTML='';
		}else if(operation == 'position'){
			document.getElementById('id_position').value=split[0];
			document.getElementById('name_position').value=split[1];
			document.getElementById('save_position').style.display='none';
			document.getElementById('update_position').style.display='inline-block';
			document.getElementById('delete_position').style.display='inline-block';
			document.getElementById('output_position').innerHTML='';
		}else if(operation == 'department'){
			document.getElementById('id_department').value=split[0];
			document.getElementById('name_department').value=split[1];
			document.getElementById('save_department').style.display='none';
			document.getElementById('update_department').style.display='inline-block';
			document.getElementById('delete_department').style.display='inline-block';
			document.getElementById('output_department').innerHTML='';
		}else if(operation == 'process'){
			document.getElementById('id_process').value=split[0];
			document.getElementById('name_process').value=split[1];
			document.getElementById('save_process').style.display='none';
			document.getElementById('update_process').style.display='inline-block';
			document.getElementById('delete_process').style.display='inline-block';
			document.getElementById('output_process').innerHTML='';
		}
		
	}
	function open_category(){
		document.getElementById('title_category').style.display='inline-block';
		document.getElementById('title_position').style.display='none';
		document.getElementById('title_department').style.display='none';
		document.getElementById('title_process').style.display='none';
		document.getElementById('for_category_section').style.display='inline-block';
		document.getElementById('for_position_department').style.display='none';
		document.getElementById('for_department_section').style.display='none';
		document.getElementById('for_process_section').style.display='none';
		document.getElementById('save_category').style.display='inline-block';
		document.getElementById('update_category').style.display='none';
		document.getElementById('delete_category').style.display='none';
		document.getElementById('all_table').innerHTML='<thead><tr><th><strong>ID:</strong></th><th><strong>Category</strong></th></tr></thead><tbody id="table_content_all"></tbody>';
		get_category();
		clear();
	}
	function open_position(){
		document.getElementById('title_category').style.display='none';
		document.getElementById('title_position').style.display='inline-block';
		document.getElementById('title_department').style.display='none';
		document.getElementById('title_process').style.display='none';
		document.getElementById('for_category_section').style.display='none';
		document.getElementById('for_position_department').style.display='inline-block';
		document.getElementById('for_department_section').style.display='none';
		document.getElementById('for_process_section').style.display='none';
		document.getElementById('save_position').style.display='inline-block';
		document.getElementById('update_position').style.display='none';
		document.getElementById('delete_position').style.display='none';
		document.getElementById('all_table').innerHTML='<thead><tr><th><strong>ID:</strong></th><th><strong>Position</strong></th></tr></thead><tbody id="table_content_all"></tbody>';
		get_position();
		clear();
	}
	function open_department(){
		document.getElementById('title_category').style.display='none';
		document.getElementById('title_position').style.display='none';
		document.getElementById('title_department').style.display='inline-block';
		document.getElementById('title_process').style.display='none';	
		document.getElementById('for_category_section').style.display='none';
		document.getElementById('for_position_department').style.display='none';
		document.getElementById('for_department_section').style.display='inline-block';
		document.getElementById('for_process_section').style.display='none';
		document.getElementById('save_department').style.display='inline-block';
		document.getElementById('update_department').style.display='none';
		document.getElementById('delete_department').style.display='none';
		document.getElementById('all_table').innerHTML='<thead><tr><th><strong>ID:</strong></th><th><strong>Department</strong></th></tr></thead><tbody id="table_content_all"></tbody>';
		get_department();
		clear();
	}
	function open_process(){
		document.getElementById('title_category').style.display='none';
		document.getElementById('title_position').style.display='none';
		document.getElementById('title_department').style.display='none';
		document.getElementById('title_process').style.display='inline-block';
		document.getElementById('for_category_section').style.display='none';
		document.getElementById('for_position_department').style.display='none';
		document.getElementById('for_department_section').style.display='none';
		document.getElementById('for_process_section').style.display='inline-block';
		document.getElementById('save_process').style.display='inline-block';
		document.getElementById('update_process').style.display='none';
		document.getElementById('delete_process').style.display='none';
		document.getElementById('all_table').innerHTML='<thead><tr><th><strong>ID:</strong></th><th><strong>Process</strong></th></tr></thead><tbody id="table_content_all"><tr onclick="get_process(&quot;Initial Process&quot;)" style="cursor:pointer;"><td class="font-weight-bolder">1</td><td class="font-weight-bolder">Initial Process</td></tr><tr onclick="get_process(&quot;Final Process&quot;)" style="cursor:pointer;"><td class="font-weight-bolder">2</td><td class="font-weight-bolder">Final Process</td></tr></tbody>';
		clear();
	}
	function clear(){
		document.getElementById('id_category').value='';
		document.getElementById('id_position').value='';
		document.getElementById('id_department').value='';
		document.getElementById('id_process').value='';
		document.getElementById('name_category').value='';
		document.getElementById('name_position').value='';
		document.getElementById('name_department').value='';
		document.getElementById('name_process').value='';
		document.getElementById('output_category').innerHTML='';
		document.getElementById('output_position').innerHTML='';
		document.getElementById('output_department').innerHTML='';
		document.getElementById('output_process').innerHTML='';
	}
	function update_category_action(){
		var id_category = document.getElementById('id_category').value;
		var name_category = document.getElementById('name_category').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_category').innerHTML=response;
				get_category();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=update_category&&id_category="+id_category+"&&name_category="+name_category, true);
		xhttp.send();
	}
	function update_position_action(){
		var id_position = document.getElementById('id_position').value;
		var name_position = document.getElementById('name_position').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_position').innerHTML=response;
				get_position();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=update_position&&id_position="+id_position+"&&name_position="+name_position, true);
		xhttp.send();
	}
	function update_department_action(){
		var id_department = document.getElementById('id_department').value;
		var name_department = document.getElementById('name_department').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_department').innerHTML=response;
				get_department();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=update_department&&id_department="+id_department+"&&name_department="+name_department, true);
		xhttp.send();
	}
	function update_process_action(){
		var id_process = document.getElementById('id_process').value;
		var name_process = document.getElementById('name_process').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_process').innerHTML=response;
				get_process
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=update_process&&id_process="+id_process+"&&name_process="+name_process, true);
		xhttp.send();
	}
	function save_category_action(){
		var name_category = document.getElementById('name_category').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_category').innerHTML=response;
				get_category();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=save_category&&name_category="+name_category, true);
		xhttp.send();
	}
	function save_position_action(){
		var name_position = document.getElementById('name_position').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_position').innerHTML=response;
				get_position();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=save_position&&name_position="+name_position, true);
		xhttp.send();
	}
	function save_department_action(){
		var name_department = document.getElementById('name_department').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_department').innerHTML=response;
				get_department();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=save_department&&name_department="+name_department, true);
		xhttp.send();
	}
	function save_process_action(){
		var name_process = document.getElementById('name_process').value;
		var process_final_initial = document.getElementById('process_final_initial').value;
		var practice_training = document.getElementById('practice_training').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_process').innerHTML=response;
				//get_process();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=save_process&&name_process="+name_process+"&&process_final_initial="+process_final_initial+"&&practice_training="+practice_training, true);
		xhttp.send();
	}
	function delete_category_action(){
		var id_category = document.getElementById('id_category').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_category').innerHTML=response;
				open_category();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=delete_category&&id_category="+id_category, true);
		xhttp.send();
	}
	function delete_position_action(){
		var id_position = document.getElementById('id_position').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_position').innerHTML=response;
				open_position();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=delete_position&&id_position="+id_position, true);
		xhttp.send();
	}
	function delete_department_action(){
		var id_department = document.getElementById('id_department').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_department').innerHTML=response;
				open_department();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=delete_department&&id_department="+id_department, true);
		xhttp.send();
	}
	function delete_process_action(){
		var id_process = document.getElementById('id_process').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('output_process').innerHTML=response;
				open_process();
			}
		};
		xhttp.open("GET", "AJAX/query_content.php?operation=delete_process&&id_process="+id_process, true);
		xhttp.send();
	}
	function load_practice(){
		var practice = document.getElementById('process_final_initial').value;
		if(practice == "Initial Process"){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Practice Training</option>'+response;
					document.getElementById('practice_training').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=initial_pt", true);
			xhttp.send();
		}else if(practice == "Final Process"){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Practice Training</option>'+response;
					document.getElementById('practice_training').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=final_pt", true);
			xhttp.send();
		}
	}
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
