<div class="modal fade" id="For_Refresh_Training_Form" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fluid">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold grey-text" id="title_modal_head">For Refresh Training</h4>
				<button type="button" class="close" aria-label="Close" onclick="close_modal()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
				<div class="col-sm-12 d-flex justify-content-center mb-2">
					<p class="h3">History of Incident Report</p>
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
								<th><strong>Date Retuned</strong></th>
								<th><strong>Violation</strong></th>
								<th><strong>Details</strong></th>
								<th><strong>Remarks</strong></th>
							</tr>
						</thead>
						<tbody id="table_content_modal">
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 d-flex justify-content-center">
					<p id="history_title" class="h4" style="display:none;">History of Process</p>
				</div>
				<div class="col-sm-12">
					<table class="table table-bordered" style="display:none;">
						<thead>
							<tr>
								<th><strong>No. of Days</strong></th>
								<th><strong>Date Suspended From</strong></th>
								<th><strong>Date Suspended To</strong></th>
								<th><strong>Process</strong></th>
								<th><strong>Practice Training</strong></th>
								<th><strong>Specific Process</strong></th>
							</tr>
						</thead>
						<tbody id="table_content_history">
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 d-flex justify-content-center">
					<p id="suspension_title" class="h4" style="display:none;">Suspension Details</p>
				</div>
				<div class="row col-sm-10">
					<div id="id_no_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="text" id="id_no_cc" class="form-control text-center" disabled>
						<input type="hidden" id="hidden_id_table" class="form-control text-center"><!-- For Hidden ID Used for Updating Result -->
						<label for="id_no_cc" id="id_no_cc_label" class="ml-3">ID No.:</label>
					</div>
					<div id="name_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="text" id="name_cc" class="form-control text-center" disabled>
						<label for="name_cc" id="name_cc_label" class="ml-3">Name:</label>
					</div>
					<div id="category_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="category_cc" class="browser-default form-control" disabled>
						</select>
					</div>
					<div id="position_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="position_cc" class="browser-default form-control" disabled>
						</select>
					</div>
					<div id="department_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="department_cc" class="browser-default form-control" disabled>
						</select>
					</div>
					<div id="date_suspended_from_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_suspended_from_cc" class="form-control text-center" disabled>
						<label for="date_suspended_from_cc" id="date_suspended_cc_label" class="ml-3">Date Suspended From:</label>
					</div>
					<div id="date_suspended_to_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_suspended_to_cc" class="form-control text-center" disabled>
						<label for="date_suspended_to_cc" id="date_suspended_cc_label" class="ml-3">Date Suspended To:</label>
					</div>
					<div id="date_return_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_returned_cc" class="form-control text-center" disabled>
						<label for="date_returned_cc" id="date_return_cc_label" class="ml-3">Date Returned:</label>
					</div>
					<div id="no_of_days_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="number" id="no_of_days_cc" class="form-control text-center" disabled>
						<label for="no_of_days_cc" id="no_of_days_label_cc" class="ml-3">No. of Days:</label>
					</div>
					<div id="violation_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="violation_cc" class="browser-default form-control" disabled>
						  <option selected>Violation</option>
						  <option value="SOP">SOP</option>
						  <option value="Others">Others</option>
						</select>
					</div>
					<div id="other_details_section" class="md-form mb-0 col-sm-4" id="div_other_details_cc" style="display:none;">
						<input type="text" id="other_details_cc" class="form-control text-center" disabled>
						<label for="other_details_cc" id="other_details_cc_label" class="ml-3">Others:</label>
					</div>
					<div id="details_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="text" id="details_cc" class="form-control text-center" disabled>
						<label for="details_cc" id="details_cc_label"class="ml-3">Details:</label>
					</div>
					<div id="process_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="process_final_initial" onchange="load_practice()" class="browser-default form-control" disabled>
							<option selected>Process</option>
							<option value="Initial Process">Initial Process</option>
							<option value="Final Process">Final Process</option>
						</select>
					</div>
					<div id="practice_training_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="practice_training" onchange="get_under_of()" class="browser-default form-control" disabled>
							<option selected>Practice Training</option>
						</select>
					</div>
					<div id="process_under_section1" class="md-form mb-0 col-sm-4" style="display:none;">
						<select id="process_under1" class="browser-default form-control" disabled>
							<option selected>Specific Process</option>
						</select>
					</div>
					<div id="date_report_tc_section"class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="date" id="date_report_to_tc_cc" class="form-control text-center" disabled>
						<label for="date_report_to_tc_cc" id="date_report_to_tc_cc_abel" class="ml-3">Date Report to TC:</label>
					</div>
					<div id="remarks_section" class="md-form mb-0 col-sm-4" style="display:none;">
						<input type="text" id="remarks_cc" class="form-control text-center" disabled>
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
			<div class="modal-footer">
			</div>
			<div class="row ml-1 mr-2">
				<div class="col-sm-3 text-center md-form">
					<select id="process_dropdown" onchange="get_process()" class="browser-default form-control">
						<option selected> Process </option>
						<option value="Initial Process"> Initial Process </option>
						<option value="Final Process"> Final Process </option>
					</select>
				</div>
				<div class="col-sm-3 text-center md-form" id="pt_section" style="display:none;">
					<select id="pt_section_select" onchange="get_under_of()" class="browser-default form-control">
					</select>
				</div>
				<div class="col-sm-3 text-center md-form" id="process_under_section" style="display:none;">
					<select id="process_under" class="browser-default form-control">
					</select>
				</div>
				<div class="md-form mb-0 col-sm-3 md-form" id="date_training_section" style="display:none;">
					<input type="date" id="date_of_training" class="form-control text-center">
					<label for="date_of_training" id="date_of_training_label" class="ml-3">Date of Training</label>
				</div>
			</div>
			<div class="row ml-0 mr-3">
				<div id="date_completed_section" class="md-form mb-0 col-sm-3" style="display:none;">
					<input type="date" id="date_completed" value=" " class="form-control text-center">
					<label for="date_completed" id="date_completed_label" class="ml-3">Date Completed:</label>
				</div>
				<div class="col-sm-3 text-center mt-4 md-form" id="result_section" style="display:none;">
					<select id="pt_section_result" class="browser-default form-control">
						<option selected> Training Result </option>
						<option> Completed </option>
						<option> Incomplete </option>
					</select>
				</div>
				<div id="trainor_section" class="md-form mb-0 col-sm-3" style="display:none;">
					<input type="text" id="name_trainor" class="form-control text-center">
					<label for="name_trainor" id="name_trainor_label" class="ml-3">Name of Trainer:</label>
				</div>
				<div class="col-sm-3 mt-2 ml-0">
					<button class="btn btn-default" id="btn_save_status" onclick="btn_save_status_function()"> Save <i class="fas fa-paper-plane ml-1"></i></button>
				</div>
			</div>
			<div class="col-sm-12 ml-1">
				<label id="output_ajax" class="mr-3 mt-1"></label>
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
				load_process();
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=department", true);
		xhttp.send();
	}
	function load_process(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				var response1  = '<option selected>Process</option>'+response;
				document.getElementById('process_under').innerHTML=response1;
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=process", true);
		xhttp.send();
	}
	function get_process(){
		document.getElementById('process_under_section').style.display="inline-block";
		var p = document.getElementById('process_dropdown').value;
		if(p == 'Initial Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200) {
					var response = this.responseText;
					var response1  = '<option selected>All Initial Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
					pt_function(p);
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=initial", true);
			xhttp.send();
		}else if(p == 'Final Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>All Final Process</option>'+response;
					document.getElementById('process_under').innerHTML=response1;
					pt_function(p);
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=final", true);
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
	function pt_function(p){
		document.getElementById('pt_section').style.display="inline-block";
		document.getElementById('date_training_section').style.display="inline-block";
		//document.getElementById('result_section').style.display="inline-block";
		//document.getElementById('trainor_section').style.display="inline-block";
		if(p == 'Initial Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Practice Training</option>'+response;
					document.getElementById('pt_section_select').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=initial_pt", true);
			xhttp.send();
		}else if(p == 'Final Process'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Practice Training</option>'+response;
					document.getElementById('pt_section_select').innerHTML=response1;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=final_pt", true);
			xhttp.send();
		}
	}
	function get_under_of(){
		var process_final_initial = document.getElementById('process_dropdown').value;
		var under_of = document.getElementById('pt_section_select').value;
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
	function get_under_of1(y,z){
		if (y == 'First' || y == 'Secondary'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Process Under of</option>'+response;
					document.getElementById('process_under1').innerHTML=response1;
					document.getElementById('process_under1').value=z;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_initial&&under_of="+y, true);
			xhttp.send();
		}else if(y == 'Sub Assembly' || y == 'Assembly'){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					var response = this.responseText;
					var response1  = '<option selected>Process Under of</option>'+response;
					document.getElementById('process_under1').innerHTML=response1;
					document.getElementById('process_under1').value=z;
				}
			};
			xhttp.open("GET", "AJAX/select_content.php?operation=get_under_of_final&&under_of="+y, true);
			xhttp.send();
		}
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
</script>