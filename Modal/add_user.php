<div class="modal fade" id="Add_User_Form" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold grey-text">Add User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
				<div class="md-form mb-0 col-sm-6">
					<input type="hidden" id="id_hidden" class="form-control text-center">
					<input type="text" id="name" class="form-control text-center">
					<label for="name" id="name_Label" class="ml-3">Name:</label>
				</div>
				<div class="md-form mb-0 col-sm-6">
					<input type="text" id="user_name" class="form-control text-center">
					<label for="user_name" id="user_name_Label" class="ml-3">Username:</label>
				</div>
				<div class="md-form mb-0 col-sm-6">
					<input type="password" id="password" class="form-control text-center">
					<label for="password" id="password_Label" class="ml-3">Password:</label>
				</div>
				<div class="md-form mb-0 col-sm-6">
					<select id="role" class="browser-default form-control">
						<option>Role</option>
						<option value="Admin">Admin</option>
						<option value="Users">User</option>
					</select>
				</div>
				<div class="md-form mb-0 col-sm-6">
					<select id="role_assigned" class="browser-default form-control">
						<option>Assigned Role</option>
						<option value="HRD-RTS-Office">HRD-RTS-Office</option>
						<option value="HRD-RTS-Training">HRD-RTS-Training</option>
					</select>
				</div>
				<div class="md-form mb-0 col-sm-6">
					<form method="post" action="AJAX/img_upload.php" enctype="multipart/form-data">
						<input type="hidden" id="id_uploaded_image" value='IMG:936959307-20190726084853am'>
						<span class="btn btn-default btn-file">
							<i class="fas fa-file-upload"></i> Browse <input type="file" id="img_upload" name="img[]" onchange="upload()" accept="image/*">
						</span>
					</form>
				</div>
				<div class="col-sm-12">
					<label id="save_output" class="d-flex justify-content-center"></label>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" onclick="save_user()" id="btn_save"> Save <i class="fas fa-paper-plane ml-1"></i></button>
				<button class="btn btn-default" onclick="update_user()" style="display:none;" id="btn_update"> Update <i class="fas fa-edit"></i></button>
				<button class="btn btn-default" onclick="delete_user()" style="display:none;" id="btn_delete"> Delete <i class="fas fa-trash"></i></button>
			</div>
		</div>
	</div>
</div>
