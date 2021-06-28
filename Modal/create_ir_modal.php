<div class="modal fade" id="Add_IR_Memo_Form" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold grey-text">Add Incident Report</h4>
				<button type="button" class="close" onclick="close_modal()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
				<input type="hidden" id="id_hidden" class="form-control text-center">
				<div class="md-form mb-0 col-sm-5">
					<input type="text" value=" " id="id_no" class="form-control text-center dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" oninput="clear_output()">
					<label for="id_no" id="id_no_Label" class="ml-3">ID No.:</label>
					<div class="dropdown-menu col-sm-11" id="dropdown_id_menu">
					</div>
				</div>
				<div class="md-form mb-0 col-sm-7">
					<input type="text" value=" " id="name" class="form-control text-center">
					<label for="name" id="name_Label" class="ml-3">Name:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="category" class="browser-default form-control">
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="position" class="browser-default form-control">
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="department" class="browser-default form-control">
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="car_model" class="browser-default form-control" onchange="specific_line()">
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="car_model_line" class="browser-default form-control">
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="number" value="1" id="no_of_days" class="form-control text-center">
					<label for="no_of_days" id="no_of_days_Label" class="ml-3">No. of Days:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="date" id="date_suspended_from" class="form-control text-center">
					<label for="date_suspended_from" id="date_suspended_from_Label" class="ml-3">Date Suspended From:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="date" id="date_suspended_to" class="form-control text-center">
					<label for="date_suspended_to" id="date_suspended_to_Label" class="ml-3">Date Suspended To:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="date" id="date_returned" class="form-control text-center">
					<label for="date_returned" id="date_return_Label" class="ml-3">Date Returned:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="violation" class="browser-default form-control" onchange="violation_action()">
					  <option selected>Violation</option>
					  <option value="SOP">SOP</option>
					  <option value="Others">Others</option>
					</select>
				</div>
				<div class="md-form mb-0 col-sm-8" id="div_other_details" style="display:none;">
					<input type="text" id="other_details" class="form-control text-center">
					<label for="other_details" id="other_details_Label" class="ml-3">Others:</label>
				</div>
				<div class="md-form mb-0 col-sm-12">
					<textarea value=" " id="details" class="md-textarea form-control text-center"></textarea>
					<label for="details" id="details_Label" class="ml-3">Details:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="process_final_initial" onchange="load_practice()" class="browser-default form-control">
						<option selected>Process</option>
						<option value="Initial Process">Initial Process</option>
						<option value="Final Process">Final Process</option>
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="practice_training" onchange="get_under_of()" class="browser-default form-control">
						<option selected>Practice Training</option>
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="process_under" class="browser-default form-control">
						<option selected>Specific Process</option>
					</select>
				</div>
				<div class="md-form mb-0 col-sm-12">
					<textarea value=" " id="remarks" class="md-textarea form-control text-center"></textarea>
					<label for="remarks" class="ml-3">Remarks:</label>
				</div>
				<div class="md-form mb-0 col-sm-4" id="date_report_section" style="display:none;">
					<input type="date" id="date_report_to_tc" class="form-control text-center">
					<label for="date_report_to_tc" id="date_report_to_tc_Label" class="ml-3">Date Report to TC:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<form method="post" action="AJAX/upload_scanned_file.php" enctype="multipart/form-data">
						<input type="hidden" id="id_uploaded_file">
						<span class="btn btn-default btn-file" id="scan_file_btn">
							<i class="fas fa-file-upload"></i> Browse <input type="file" id="scan_file" name="upload[]" onchange="upload()" multiple="multiple" accept="application/pdf">
						</span>
					</form>
				</div>
				<div class="col-sm-12 row text-center mx-auto" id="uploaded_scan_file_section">
				</div>
				<div class="col-sm-12 text-center mt-2">
					<label id="all_files"></label>
				</div>
				<div class="col-sm-12 text-center mt-2">
					<label id="violation_count" class="text-center"></label><br>
				</div>
				<div class="col-sm-12">
					<label id="save_output" class="d-flex justify-content-center"></label>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" onclick="save_ir()" id="btn_save"> Save <i class="fas fa-paper-plane ml-1"></i></button>
				<button class="btn btn-default" onclick="update_ir()" style="display:none;" id="btn_update"> Update <i class="fas fa-edit"></i></button>
				<button class="btn btn-default" onclick="delete_ir()" style="display:none;" id="btn_delete"> Delete <i class="fas fa-trash"></i></button>
			</div>
		</div>
	</div>
</div>
<script>
	<!-- To Load the Content of Category -->
	load_category();
	<!-- All Functions -->
	function load_category(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Category</option>'+response;
				document.getElementById('category').innerHTML=response1;
				<!-- To Load the Content of Position -->
				load_position();
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=category", true);
		xhttp.send();
	}
	function load_position(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Position</option>'+response;
				document.getElementById('position').innerHTML=response1;
				<!-- To Load the Content of Department -->
				load_department();
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=position", true);
		xhttp.send();
	}
	function load_department(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Department</option>'+response;
				document.getElementById('department').innerHTML=response1;
				<!-- To Load the Content of Car MOdel -->
				load_car_model();
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=department", true);
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
	function load_practice1(x,y,z){
		if(x == "Initial Process"){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Practice Training</option>'+response;
					document.getElementById('practice_training').innerHTML=response1;
					document.getElementById('practice_training').value=y;
					get_under_of1(x,y,z);
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=initial_pt", true);
			xhttp.send();
		}else if(x == "Final Process"){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Practice Training</option>'+response;
					document.getElementById('practice_training').innerHTML=response1;
					document.getElementById('practice_training').value=y;
					get_under_of1(x,y,z);
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=final_pt", true);
			xhttp.send();
		}
	}
	function get_under_of(){
		var under_of = document.getElementById('practice_training').value;
		var process_final_initial = document.getElementById('process_final_initial').value;
		if (under_of == 'First' || under_of == 'Secondary'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_initial&&under_of="+under_of, true);
			xhttp.send();
		}else if(under_of == 'Sub Assembly' || under_of == 'Assembly'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_final&&under_of="+under_of, true);
			xhttp.send();
		}else if(process_final_initial == 'Initial Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_initial&&under_of="+under_of, true);
			xhttp.send();
		}
		else if(process_final_initial == 'Final Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_final&&under_of="+under_of, true);
			xhttp.send();
		}
	}
	function get_under_of1(x,y,z){
		if (y == 'First' || y == 'Secondary'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
					document.getElementById('process_under').value=z;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_initial&&under_of="+x, true);
			xhttp.send();
		}else if(y == 'Sub Assembly' || y == 'Assembly'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
					document.getElementById('process_under').value=z;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_final&&under_of="+y, true);
			xhttp.send();
		}else if(x == 'Initial Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
					document.getElementById('process_under').value=z;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_initial&&under_of="+y, true);
			xhttp.send();
		}
		else if(x == 'Final Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Specific Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
					document.getElementById('process_under').value=z;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_final&&under_of="+y, true);
			xhttp.send();
		}
	}
	function load_car_model(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Car Model</option>'+response;
				document.getElementById('car_model').innerHTML=response1;
				<!-- To Load the Content of Line -->
				load_car_model_line();
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=car_model", true);
		xhttp.send();
	}
	function load_car_model_line(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Line</option>'+response;
				document.getElementById('car_model_line').innerHTML=response1;
				<!-- To Load the Content of Process -->
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=car_model_line", true);
		xhttp.send();
	}
	function specific_line(){
		var car_model = document.getElementById('car_model').value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Line</option>'+response;
				document.getElementById('car_model_line').innerHTML=response1;
				<!-- To Load the Content of Process -->
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=line_specific&keyword="+car_model, true);
		xhttp.send();
	}
	function load_specific_line(x,y){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Line</option>'+response;
				document.getElementById('car_model_line').innerHTML=response1;	
				document.getElementById('car_model_line').value=y;	
				<!-- To Load the Content of Process -->
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=line_specific&keyword="+x, true);
		xhttp.send();
	}
	function violation_action(){
		var val = document.getElementById('violation').value;
		if(val == "Others"){
		document.getElementById('div_other_details').style.display="inline-block";
		}else{
		document.getElementById('div_other_details').style.display="none";
		}
	}
</script>