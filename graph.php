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
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body class="bg">
<div class="card_opa">
<br>
	<?php
		// This is for Navagation
		include 'Nav/header.php';
	?>
	<div class="col-sm-12 col-md-12 col-lg-12 text-center mt-1">
		<label class="h3"><i class="fas fa-chart-bar"></i> IR/Memo Graph Report</label>
	</div>
	<div class="row">
		<div class="row col-sm-5 ml-2">
			<div class="col-sm-12">
				<label class="h4">Category</label>
			</div>
			<div class="md-form mb-0 col-sm-12">
				<input type="date" id="date_from" class="form-control text-center">
				<label for="date_from" class="ml-3">Date From:</label>
			</div>
			<div class="md-form mb-0 col-sm-12">
				<input type="date" id="date_to" class="form-control text-center">
				<label for="date_to" class="ml-3">Date From:</label>
			</div>
			<div class="col-sm-12">
				<button onclick="generate_graph()" class="btn btn-default">Generate Graph</button>
			</div>
		</div>
		<div class="row col-sm-6">
			<div class="col-sm-12" id="barChart_div">
				<canvas id="barChart"></canvas>
			</div>
		</div>
	</div><br><br>
	<div class="row">
		<div class="row col-sm-5 ml-2">
			<div class="col-sm-12">
				<label class="h4">Car Model</label>
			</div>
			<div class="md-form mb-0 col-sm-12">
				<input type="date" id="date_from_car" class="form-control text-center">
				<label for="date_from_car" class="ml-3">Date From:</label>
			</div>
			<div class="md-form mb-0 col-sm-12">
				<input type="date" id="date_to_car" class="form-control text-center">
				<label for="date_to_car" class="ml-3">Date From:</label>
			</div>
			<div class="col-sm-12">
				<button onclick="generate_graph_car()" class="btn btn-default">Generate Graph</button>
			</div>
		</div>
		<div class="row col-sm-6">
			<div class="col-sm-12">
				<canvas id="barChart_2"></canvas>
			</div>
		</div>
	</div>
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<script>
	function generate_graph(){
		var filter = "Category";
		var date_from = document.getElementById('date_from').value;
		var date_to = document.getElementById('date_to').value;
		document.getElementById('barChart_div').innerHTML="";
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				var split = response.split(',~!~,');
				var data_graph = split[1];
				var split2 = data_graph.split(',');
				var label_graph = ["Add Even","FAS","Maxim","Megatrend","One Source","PKIMT"];
				document.getElementById('barChart_div').innerHTML='<canvas id="barChart"></canvas>';
				var data_graph = [parseInt(split2[0]),parseInt(split2[1]),parseInt(split2[2]),parseInt(split2[3]),parseInt(split2[4]),parseInt(split2[5])];
				var ctxB = document.getElementById("barChart").getContext('2d');
				var myBarChart = new Chart(ctxB, {
				  type: 'bar',
				  data: {
					labels: label_graph,
					datasets: [{
					  label: '# Total IR/Memo ',
					  data: data_graph,
					  backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)',
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					  ],
					  borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)',
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					  ],
					  borderWidth: 1
					}]
				  },
				  options: {
					scales: {
					  yAxes: [{
						ticks: {
						  beginAtZero: true
						}
					  }]
					}
				  }
				});
			}
		};
		xhttp.open("GET", "AJAX/graph_details.php?filter="+filter+"&&date_from="+date_from+"&&date_to="+date_to, true);
		xhttp.send();
	}
</script>
<script>
	function generate_graph_car(){
		var filter = "Car Model";
		var date_from = document.getElementById('date_from_car').value;
		var date_to = document.getElementById('date_to_car').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				var split = response.split(',~!~,');
				var data_graph = split[1];
				var split2 = data_graph.split(',');
				var label_graph = ["Daihatsu","Honda","Mazda","Nissan","Subaru","Suzuki","Toyota"];
				var data_graph = [parseInt(split2[0]),parseInt(split2[1]),parseInt(split2[2]),parseInt(split2[3]),parseInt(split2[4]),parseInt(split2[5]),parseInt(split2[6])];
				var ctxB = document.getElementById("barChart_2").getContext('2d');
				var myBarChart = new Chart(ctxB, {
				  type: 'bar',
				  data: {
					labels: label_graph,
					datasets: [{
					  label: '# Total IR/Memo ',
					  data: data_graph,
					  backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)',
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					  ],
					  borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)',
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					  ],
					  borderWidth: 1
					}]
				  },
				  options: {
					scales: {
					  yAxes: [{
						ticks: {
						  beginAtZero: true
						}
					  }]
					}
				  }
				});
			}
		};
		xhttp.open("GET", "AJAX/graph_details.php?filter="+filter+"&&date_from="+date_from+"&&date_to="+date_to, true);
		xhttp.send();
	}
</script>
</body>
</html>
