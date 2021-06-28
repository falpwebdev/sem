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
		include 'Modal/add_user.php';
	?>
	<br>
	<div class="card_opa">
		<div class="row">
			<div class="md-form mb-0 col-sm-3">
				<input type="text" id="Search" class="form-control text-center ml-3" oninput="search_users()">
				<label for="Search" id="Sear_Label" class="ml-3"> <i class="fas fa-search ml-3"></i> Search</label>
			</div>
			<div class="col-sm-9 d-flex justify-content-end">
				<button class="btn btn-default mt-3" onclick="modal_action()"><i class="fas fa-plus"></i> Add User </button>
			</div>
		</div>
		<div class="row mx-auto" id="list_of_users">
		</div>
	</div>
<script>
get_users();
function get_users(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			document.getElementById('list_of_users').innerHTML=response;
		}
	};
	xhttp.open("GET", "AJAX/user_management_query.php?operation=all", true);
	xhttp.send();
}
function search_users(){
	var keyword = document.getElementById('Search').value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			document.getElementById('list_of_users').innerHTML=response;
		}
	};
	xhttp.open("GET", "AJAX/user_management_query.php?operation=search&keyword="+keyword, true);
	xhttp.send();
}
function save_user(){
	var username = document.getElementById('user_name').value;
	var name = document.getElementById('name').value;
	var role = document.getElementById('role').value;
	var role_assigned = document.getElementById('role_assigned').value;
	var password = document.getElementById('password').value;
	var id_uploaded_image = document.getElementById('id_uploaded_image').value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			document.getElementById('save_output').innerHTML=response;
			get_users();
		}
	};
	xhttp.open("GET", "AJAX/user_management_query.php?operation=save&username="+username+"&name="+name+"&role="+role+"&password="+password+"&id_uploaded_image="+id_uploaded_image+"&role_assigned="+role_assigned, true);
	xhttp.send();
}
function update_user(){
	var id_hidden = document.getElementById('id_hidden').value;
	var username = document.getElementById('user_name').value;
	var name = document.getElementById('name').value;
	var role = document.getElementById('role').value;
	var password = document.getElementById('password').value;
	var id_uploaded_image = document.getElementById('id_uploaded_image').value;
	var role_assigned = document.getElementById('role_assigned').value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			document.getElementById('save_output').innerHTML=response;
			get_users();
		}
	};
	xhttp.open("GET", "AJAX/user_management_query.php?operation=update&username="+username+"&name="+name+"&role="+role+"&password="+password+"&id_hidden="+id_hidden+"&id_uploaded_image="+id_uploaded_image+"&role_assigned="+role_assigned, true);
	xhttp.send();
}
function delete_user(){
	var id_hidden = document.getElementById('id_hidden').value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;
			document.getElementById('save_output').innerHTML=response;
			get_users();
		}
	};
	xhttp.open("GET", "AJAX/user_management_query.php?operation=delete&id_hidden="+id_hidden, true);
	xhttp.send();
}
function clear(){
	document.getElementById('user_name').value='';
	document.getElementById('name').value='';
	document.getElementById('role').value='Role';
	document.getElementById('password').value='';
	document.getElementById('save_output').value='';
	document.getElementById('id_uploaded_image').value='IMG:936959307-20190726084853am';
}
function get_data_user(x){
	var split = x.split('~!~');
	var id = split[0];
	var username = split[1];
	var name = split[2];
	var role = split[3];
	var password = split[4];
	var location = split[5];
	var role_assigned = split[6];
	document.getElementById('id_hidden').value=id;
	document.getElementById('user_name').value=username;
	document.getElementById('name').value=name;
	document.getElementById('role').value=role;
	document.getElementById('role_assigned').value=role_assigned;
	document.getElementById('password').value=password;
	document.getElementById('id_uploaded_image').value=location;
	document.getElementById('btn_update').style.display='inline-block';
	document.getElementById('btn_delete').style.display='inline-block';
	document.getElementById('btn_save').style.display='none';
	$("#Add_User_Form").modal();
	
}
function modal_action(){ 
	$("#Add_User_Form").modal();
	clear();
}
</script>
<!-- For upload Files -->
<script type="text/javascript">
    function upload(){
        var form_data = new FormData();
		var user_name = document.getElementById('user_name').value;
        var ins = document.getElementById('img_upload').files.length;
		for (var x = 0; x < ins; x++) {
            form_data.append("img[]", document.getElementById('img_upload').files[x]);
        }
        $.ajax({
            url: 'AJAX/upload_image_file.php?user_name='+user_name, // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
			success: function (response){
            $('#id_uploaded_image').val(response); // display success response from the PHP script
            },
            error: function (response) {
            $('#msg').html(response); // display error response from the PHP script
            }
        });
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
