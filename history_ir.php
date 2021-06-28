<?php
	session_start();
	$username_session = $_SESSION["username_session"];
	$keyword = $_GET['id_no'];
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
	<title>IR / MEMO History</title>
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
		include 'Modal/create_ir_modal.php';
	?>
	<div class="card_opa">
		<br>
		<div class="row">
			<div class="md-form mb-0 col-sm-3">
				<input type="text" id="Search" class="form-control text-center ml-3" oninput="search_ir()">
				<label for="Username" id="Sear_Label" class="ml-3"> <i class="fas fa-search ml-3"></i> Search</label>
			</div>
			<div class="col-sm-12 d-flex justify-content-center">
				<p class="h3">IR History</p>
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
							<th><strong>Date Suspended From</strong></th>
							<th><strong>Date Suspended To</strong></th>
							<th><strong>Date Returned</strong></th>
							<th><strong>Violation</strong></th>
							<th><strong>Details</strong></th>
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
	search_ir_history();
	function search_ir_history(){
		var keyword = "<?php echo $keyword;?>";
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				document.getElementById('table_content').innerHTML=response;
			}
		};
		xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_ir_history&&keyword="+keyword, true);
		xhttp.send();
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
