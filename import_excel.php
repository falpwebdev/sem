  <span class="btn btn-primary btn-file"><span class="fileupload-new">Upload Penerima</span><input type="file" id="xlsfile"/></span>
	<span class="fileupload-preview"></span>
	<button type="button" class="btn btn-primary">Download Format</button>
	<form class="navbar-form navbar-center">
	<textarea name="jmltextarea" id="jmltextarea" class="form-control" style="min-width: 100%" rows="15" id="comment"></textarea>
	</form>
	<form class="navbar-form navbar-right">
	<button type="button" class="btn btn-primary btn-right-side" style="margin-right:15px;" id="kirim">Kirim</button>
	</form>
	<script>
		$("#kirim").click(function() {
		var jmltextarea = $("#jmltextarea").val();
		var xlsfile = $("#xlsfile").val();
		$.ajax ({
			type:"POST",
			url:"proses_kirim.php",
			data: "jmltextarea=" + jmltextarea + "&xlsfile=" + xlsfile,
			success: function(data){
			$("#info").html(data);
			}
		});
	});
	</script>