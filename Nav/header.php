<nav class="navbar fixed-top navbar-expand-lg navbar-dark default-color">
	<img src="logo/fas.png" width="100px" class="mr-3 ml-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2 mb-2" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li id="deployed_page" class="nav-item">
				<a class="nav-link" href="deployed.php"> <i class="fas fa-users"></i> Employees </a>
			</li>
			<li id="main_page" class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="ir_page_toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-file"></i> IR/Memo </a>
				<div class="dropdown-menu dropdown-primary default-color" aria-labelledby="navbarDropdownMenuLink" style="width:230px;">
					<div id="list_ir_memo_nav">
						<a class="nav-link" href="ir_memo.php"><i class="fas fa-file"></i> List of IR/Memo <!--span class="badge badge-danger" id="badge_for_practice_training"></span--></a>
					</div>
					<div id="ir_memo_chart">
						<a class="nav-link" href="graph.php"><i class="far fa-chart-bar"></i> IR/Memo Chart <!--span class="badge badge-danger" id="badge_ongoing_practice"></span--></a>
					</div>
				</div>
			</li>
			<li id="cancel_certificate_page" class="nav-item">
				<a class="nav-link" href="cancel_certificate_page.php" id="cancel_certificate_page_toggle"> <i class="fas fa-ban"></i> Cancelled Certificate</a>
			</li>
			<!-- Start Navigation for Practice Training -->
			<li class="nav-item dropdown" id="practice_training_page">
				<a class="nav-link dropdown-toggle" id="practice_training_page_toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-sync-alt"></i> Practice Training</a>
				<div class="dropdown-menu dropdown-primary default-color" aria-labelledby="navbarDropdownMenuLink" style="width:230px;">
					<div id="content_page">
						<a class="nav-link" href="practice_training.php"><i class="fas fa-retweet"></i> For Practice Training <span class="badge badge-danger" id="badge_for_practice_training"></span></a>
					</div>
					<div id="ongoing_refresh_training">
						<a class="nav-link" href="ongoing_practice_training.php"><i class="fas fa-spinner"></i> Ongoing <span class="badge badge-danger" id="badge_ongoing_practice"></span></a>
					</div>
					<div id="completed_refresh_training">
						<a class="nav-link" href="passed_practice_training.php"><i class="fas fa-check-circle"></i> Passed <span class="badge badge-danger" id="badge_passed_practice"></span></a>
					</div>
					<div id="incomplete_refresh_training">
						<a class="nav-link" href="failed_practice_training.php"><i class="fas fa-exclamation-triangle"></i> Failed <span class="badge badge-danger" id="badge_failed_practice"></span></a>
					</div>
				</div>
			</li>
			<!-- End Navigation for Practice Training -->
			<!-- Start Navigation for Refresh Training -->
			<li class="nav-item dropdown" id="refresh_training_page">
				<a class="nav-link dropdown-toggle" id="refresh_training_page_toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-redo-alt"></i> Refresh Training</a>
				<div class="dropdown-menu dropdown-primary default-color" aria-labelledby="navbarDropdownMenuLink" style="width:230px;">
					<div id="content_page">
						<a class="nav-link" href="refresh_training.php"><i class="fas fa-code-branch"></i> For Refresh Training <span class="badge badge-danger" id="badge_for_refresh_training"></span></a>
					</div>
					<div id="ongoing_refresh_training">
						<a class="nav-link" href="ongoing_refresh_training.php"><i class="fas fa-spinner"></i> Ongoing <span class="badge badge-danger" id="badge_ongoing_refresh"></span></a>
					</div>
					<div id="completed_refresh_training">
						<a class="nav-link" href="completed_refresh_training.php"><i class="fas fa-check-circle"></i> Completed <span class="badge badge-danger" id="badge_completed_refresh"></span></a>
					</div>
					<div id="incomplete_refresh_training">
						<a class="nav-link" href="incomplete_refresh_training.php"><i class="fas fa-exclamation-triangle"></i> Incomplete <span class="badge badge-danger" id="badge_incomplete_refresh"></span></a>
					</div>
				</div>
			</li>
			<!-- End Navigation for Refresh Training -->
			<li class="nav-item dropdown" id="notification_page">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-bell"></i> Notification <span class="badge badge-danger" id="badge_notification"></span></a>
				<div class="dropdown-menu dropdown-primary default-color" aria-labelledby="navbarDropdownMenuLink" style="width:500px;">
					<div id="content_page_notification">
					</div>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cog"></i> Settings</a>
				<div class="dropdown-menu dropdown-primary default-color" aria-labelledby="navbarDropdownMenuLink" style="width:200px;">
					<div id="content_management_page" style="display:none;">
						<a class="nav-link" href="content_page.php"> <i class="fas fa-desktop"></i> Content Management </a>
					</div>
					<div id="user_management_page" style="display:none;">
						<a class="nav-link" href="user_management.php"><i class="fas fa-users-cog"></i> User Management </a>
					</div>
					<div>
						<a class="nav-link" href="AJAX/logout.php"><i class="fas fa-unlock"></i> Logout <img id="profile_pic_nav" src="Profile/9243186232019-07-30-04-32-42am.png" class="img-fluid card-img-100 rounded-circle" style="margin-left:5px;width:30px;height:30px;"></a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>
<script>
var picture = '<?php echo $_SESSION["user_pic"];?>';
	document.getElementById('profile_pic_nav').src='Profile/'+picture;
	role();
	function role(){
		var role1 = '<?php echo $_SESSION["role"];?>';
		if(role1 == 'Admin'){
			document.getElementById('content_management_page').style.display='inline-block';
			document.getElementById('user_management_page').style.display='inline-block';
		}else{
			
		}
	}
</script>
<br>
<br>