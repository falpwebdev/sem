<div class="modal fade" id="update_return_status" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold grey-text">Update Return Status</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
                <input type="hidden" name="" id="recID">
                <input type="hidden" id="dataLoad">
                <!-- <div class="md-form mb-0 col-sm-7"> 
                    <input type="text" name="" id="employeeID" disabled>
                </div> -->
                <table class="table" style="font-size:10px;">
                    <tr>
                        <td style="font-weight:bold;">EMPLOYEE ID:</td>
                        <td id="employeeID"></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">NAME:</td>
                        <td id="empName"></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">VIOLATION:</td>
                        <td id="violation"></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">DETAILS:</td>
                        <td id="details"></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">VIOLATION REMARKS:</td>
                        <td id="remarks"></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">RETURN REMARKS:</td>
                        <td>
                            <input type="text" name="" id="return_remarks" class="form-control" placeholder="Input returning remarks..">
                        </td>
                    </tr>
                </table>

			</div>
			<div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-sm btn-rounded blue white-text" onclick="update_return()">Update</button>

			</div>
		</div>
	</div>
</div>