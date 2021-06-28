<div class="modal fade" id="Add_IR_Memo_Form" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold grey-text">Add Incident Report</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
				<input type="hidden" id="id_hidden" class="form-control text-center">
				<div class="md-form mb-0 col-sm-5">
					<input type="text" id="id_no" class="form-control text-center dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" oninput="clear_output()">
					<label for="id_no" id="id_no_Label" class="ml-3">ID No.:</label>
					<div class="dropdown-menu col-sm-11" id="dropdown_id_menu">
					</div>
				</div>
				<div class="md-form mb-0 col-sm-7">
					<input type="text" id="name" class="form-control text-center">
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
					<input type="number" id="no_of_days" class="form-control text-center">
					<label for="no_of_days" id="no_of_days_Label" class="ml-3">No. of Days:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="date" id="date_suspended" class="form-control text-center">
					<label for="date_suspended" id="date_suspended_Label" class="ml-3">Date Suspended:</label>
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
				<div class="md-form mb-0 col-sm-4" id="div_other_details" style="display:none;">
					<input type="text" id="other_details" class="form-control text-center">
					<label for="other_details" id="other_details_Label" class="ml-3">Others:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="text" id="details" class="form-control text-center">
					<label for="details" id="details_Label"class="ml-3">Details:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<select id="process" class="browser-default form-control">
					</select>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="date" id="date_report_to_tc" class="form-control text-center">
					<label for="date_report_to_tc" id="date_report_to_tc_Label" class="ml-3">Date Report to TC:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="text" id="remarks" class="form-control text-center">
					<label for="remarks" class="ml-3">Remarks:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<span class="btn btn-default btn-file">
						Browse <input type="file">
					</span>
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
				document.getElementById('process').innerHTML=response1;
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=process", true);
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