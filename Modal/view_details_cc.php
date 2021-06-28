<div class="modal fade" id="View_Details_CC" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fluid">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold grey-text">Suspension Details</h4>
				<button type="button" class="close" aria-label="Close" onclick="close_modal()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
				<div class="col-sm-12 d-flex justify-content-center mb-2">
					<p class="h3">List of Incident Report</p>
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
								<th><strong>Date Suspended to</strong></th>
								<th><strong>Date Retuned</strong></th>
								<th><strong>Violation</strong></th>
								<th><strong>Process</strong></th>
								<th><strong>Details</strong></th>
								<th><strong>Date Report to TC</strong></th>
								<th><strong>Remarks</strong></th>
							</tr>
						</thead>
						<tbody id="table_content_cc">
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 d-flex justify-content-center" >
					<p id="suspension_title" class="h4" style="display:none;">Suspension Details</p>
				</div>
				<div class="row col-sm-10">
					<div id="id_no_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="text" id="id_no_cc" class="form-control text-center">
						<label for="id_no_cc" id="id_no_cc_label" class="ml-3">ID No.:</label>
					</div>
					<div id="name_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="text" id="name_cc" class="form-control text-center">
						<label for="name_cc" id="name_cc_label" class="ml-3">Name:</label>
					</div>
					<div id="category_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="category_cc" class="browser-default form-control">
						</select>
					</div>
					<div id="position_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="position_cc" class="browser-default form-control">
						</select>
					</div>
					<div id="department_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="department_cc" class="browser-default form-control">
						</select>
					</div>
					<div class="md-form mb-0 col-sm-4" id="car_model_section" style="display:none;">
						<select id="car_model" class="browser-default form-control" onchange="specific_line()">
						</select>
					</div>
					<div class="md-form mb-0 col-sm-4" id="car_model_line_section" style="display:none;">
						<select id="car_model_line" class="browser-default form-control">
						</select>
					</div>
					<div id="no_of_days_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="number" id="no_of_days_cc" class="form-control text-center">
						<label for="no_of_days" id="no_of_days_label_cc" class="ml-3">No. of Days:</label>
					</div>
					<div id="date_suspended_from_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_suspended_from_cc" class="form-control text-center">
						<label for="date_suspended_from_cc" id="date_suspended_from_cc_label" class="ml-3">Date Suspended From:</label>
					</div>
					<div id="date_suspended_to_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_suspended_to_cc" class="form-control text-center">
						<label for="date_suspended_to_cc" id="date_suspended_to_cc_label" class="ml-3">Date Suspended To:</label>
					</div>
					<div id="date_return_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_returned_cc" class="form-control text-center">
						<label for="date_returned_cc" id="date_return_cc_label" class="ml-3">Date Returned:</label>
					</div>
					<div id="violation_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="violation_cc" class="browser-default form-control">
						  <option selected>Violation</option>
						  <option value="SOP">SOP</option>
						  <option value="Others">Others</option>
						</select>
					</div>
					<div id="other_details_section" class="md-form mb-0 col-sm-4" id="div_other_details_cc" style="display:none;">
						<input type="text" id="other_details_cc" class="form-control text-center">
						<label for="other_details_cc" id="other_details_cc_label" class="ml-3">Others:</label>
					</div>
					<div id="details_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<textarea value=" " id="details_cc" class="md-textarea form-control text-center"></textarea>
						<label for="details_cc" id="details_cc_label"class="ml-3">Details:</label>
					</div>
					<div id="process_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="process_final_initial" onchange="load_practice()" class="browser-default form-control">
							<option selected>Process</option>
							<option value="Initial Process">Initial Process</option>
							<option value="Final Process">Final Process</option>
						</select>
					</div>
					<div id="practice_training_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="practice_training" onchange="get_under_of()" class="browser-default form-control">
							<option selected>Practice Training</option>
						</select>
					</div>
					<div id="process_under_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="process_under" class="browser-default form-control">
							<option selected>Especific Process</option>
						</select>
					</div>
					<div id="date_report_tc_section"class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_report_to_tc_cc" class="form-control text-center">
						<label for="date_report_to_tc_cc" id="date_report_to_tc_cc_abel" class="ml-3">Date Report to TC:</label>
					</div>
					<div id="remarks_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<textarea value=" " id="remarks_cc" class="md-textarea form-control text-center"></textarea>
						<label for="remarks_cc" class="ml-3">Remarks:</label>
					</div>
				</div>
				<div id="suspension_attachement_section" class="col-sm-2 text-center" style="display:none;">
					<label class="h5"><i class="fas fa-paperclip"></i> Attachments</label>
					<label id="scan_copy_section"></label>
				</div>
				<!-- For Show and Hide Detail -->
				<div class="col-sm-12 text-center">
					<input type="hidden" value="show" id="show_hide_status">
					<label class="text-default h5" style="cursor:pointer;display:none;" id="show_hide_trigger" onclick="show_less()"><i class="fas fa-ellipsis-h"></i><label>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-start mr-3">
				<div id="certificate_section" class="md-form mb-0 col-sm-3">
					<input type="text" id="certificate" class="form-control text-center">
					<input type="hidden" id="process_final_initial_hidden" class="form-control text-center">
					<input type="hidden" id="practice_training_hidden" class="form-control text-center">
					<input type="hidden" id="process_under_hidden" class="form-control text-center">
					<label for="certificate" id="certificate_label" class="ml-3">Certificate No.:</label>
				</div>
				<div id="date_issued_section" class="md-form mb-0 col-sm-3">
					<input type="date" id="date_issued" class="form-control text-center">
					<label for="date_issued" id="date_issued_label" class="ml-3">Date Issued:</label>
				</div>
				<div id="for_cc_or_refresh_section" class="col-sm-2 text-center md-form">
					<select id="cc_or_refresh" class="browser-default form-control">
						<option selected> Status </option>
						<option value="Practice Training"> Practice Training </option>
						<option value="Refresh Training"> Refresh Training </option>
					</select>
				</div>
				<button class="btn btn-default" id="btn_save_status" onclick="btn_save_status_function()"> Save <i class="fas fa-paper-plane ml-1"></i></button>
			</div>
			<div class="d-flex justify-content-start mb-4 ml-4">
				<label id="output_ajax" class="ml-1"></label>
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
				document.getElementById('category_cc').innerHTML=response1;
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
				document.getElementById('position_cc').innerHTML=response1;
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
				document.getElementById('department_cc').innerHTML=response1;
				<!-- To Load the Content of Process -->
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
					get_under_of();
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
					get_under_of();
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
					get_under_of1(y,z);
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
					get_under_of1(y,z);
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=final_pt", true);
			xhttp.send();
		}
	}
	function get_under_of(){
		var under_of = document.getElementById('practice_training').value;
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
		}
	}
	function get_under_of1(y,z){
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
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_initial&&under_of="+y, true);
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
		}
	}
	function load_car_model(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Car Model</option>'+response;
				document.getElementById('car_model').innerHTML=response1;
				<!-- To Load the Content of Process -->
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=car_model", true);
		xhttp.send();
	}
	function load_car_model1(x,y){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Car Model</option>'+response;
				document.getElementById('car_model').innerHTML=response1;
				document.getElementById('car_model').value=x;
				<!-- To Load the Content of Process -->
				load_specific_line(x,y);
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=car_model", true);
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