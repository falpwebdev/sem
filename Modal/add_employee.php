<div class="modal fade" id="Add_Employee_Form" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold grey-text">Add Employee</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
				<input type="hidden" id="id_hidden" class="form-control text-center">
				<div class="md-form mb-0 col-sm-5">
					<input type="text" id="id_no" class="form-control text-center" oninput="search_id_no_add()">
					<label for="id_no" id="id_no_Label" class="ml-3">ID No.:</label>
				</div>
				<div class="md-form mb-0 col-sm-7">
					<input type="text" id="name" value=" " class="form-control text-center">
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
					<input type="date" id="date_deployed" class="form-control text-center">
					<label for="date_deployed" id="date_deployed_Label" class="ml-3">Date Deployed:</label>
				</div>
				<div class="md-form mb-0 col-sm-4">
					<input type="text" value=" "  id="batch_no" class="form-control text-center">
					<label for="batch_no" id="batch_no_Label" class="ml-3">Batch No.:</label>
				</div>
				<div class="md-form mb-0 col-sm-12">
					<input type="text" value=" "  id="remarks" class="form-control text-center">
					<label for="remarks" id="remarks_Label" class="ml-3">Remarks:</label>
				</div>
				<div class="col-sm-12">
					<label id="save_output" class="d-flex justify-content-center"></label>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" onclick="save_employee()" id="btn_save"> Save <i class="fas fa-paper-plane ml-1"></i></button>
				<button class="btn btn-default" onclick="update_employee()" style="display:none;" id="btn_update"> Update <i class="fas fa-edit"></i></button>
				<button class="btn btn-default" onclick="delete_employee()" style="display:none;" id="btn_delete"> Delete <i class="fas fa-trash"></i></button>
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
			}
		};
		xhttp.open("GET", "AJAX/select_content.php?operation=department", true);
		xhttp.send();
	}
</script>