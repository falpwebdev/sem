setInterval(check_notification, 5000);
function check_notification(){
	check_for_practice();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_notification').innerHTML=response;
			}else{
				document.getElementById('badge_notification').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=returned", true);
	xhttp.send();
}
function check_for_practice(){
	check_ongoing_practice();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_for_practice_training').innerHTML=response;
			}else{
				document.getElementById('badge_for_practice_training').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=for_practice", true);
	xhttp.send();
}
function check_ongoing_practice(){
	check_passed_practice();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_ongoing_practice').innerHTML=response;
			}else{
				document.getElementById('badge_ongoing_practice').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=ongoing_practice", true);
	xhttp.send();
}
function check_passed_practice(){
	check_failed_practice();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_passed_practice').innerHTML=response;
			}else{
				document.getElementById('badge_passed_practice').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=passed_practice", true);
	xhttp.send();
}
function check_failed_practice(){
	check_for_refresh();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_failed_practice').innerHTML=response;
			}else{
				document.getElementById('badge_failed_practice').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=failed_practice", true);
	xhttp.send();
}
function check_for_refresh(){
	check_ongoing_refresh();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_for_refresh_training').innerHTML=response;
			}else{
				document.getElementById('badge_for_refresh_training').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=for_refresh", true);
	xhttp.send();
}
function check_ongoing_refresh(){
	check_completed_refresh();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_ongoing_refresh').innerHTML=response;
			}else{
				document.getElementById('badge_ongoing_refresh').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=ongoing_refresh", true);
	xhttp.send();
}
function check_completed_refresh(){
	check_incomplete_refresh();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_completed_refresh').innerHTML=response;
			}else{
				document.getElementById('badge_completed_refresh').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=completed_refresh", true);
	xhttp.send();
}
function check_incomplete_refresh(){
	get_notifications();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			if(response > 0){
				document.getElementById('badge_incomplete_refresh').innerHTML=response;
			}else{
				document.getElementById('badge_incomplete_refresh').innerHTML='';
			}
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=incomplete_refresh", true);
	xhttp.send();
}
function get_notifications(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			var response = this.responseText;
				document.getElementById('content_page_notification').innerHTML=response;
		}
	};
	xhttp.open("GET", "AJAX/realtime_notification.php?operation=get_notification_content", true);
	xhttp.send();
}