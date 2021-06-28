var loc = window.location;
var loc_to_string =loc.toString()
var loc_new = loc_to_string.includes("ir_memo.php");
if (loc_new == true){
	function open_notification_content_all(x){
		open_notification_content_all_go(x);
	}
	function open_notification_content_single(x){
		open_notification_content_single_go(x);
	}
}
function open_notification_content_single_go(x){
	var split = x.split('~!~');
	var id = split[0];
	var id_no = split[1];
	var limiter = document.getElementById('load_more_count_ir').value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;	
			var count = parseInt(limiter) + 20;
			document.getElementById('load_more_count_ir').value=count;					
			document.getElementById('table_content').innerHTML=response;
			count_all_ir();
		}
	};
	xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_single_notif&&limiter="+limiter+"&&id="+id+"&id_no="+id_no, true);
	xhttp.send();
}
function open_notification_content_all_go(x){
	var limiter = document.getElementById('load_more_count_ir').value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			var response = this.responseText;	
			var count = parseInt(limiter) + 20;
			document.getElementById('load_more_count_ir').value=count;					
			document.getElementById('table_content').innerHTML=response;
			count_all_ir();
		}
	};
	xhttp.open("GET", "AJAX/query_ir_search.php?operation=search_all_notif&&limiter="+limiter+"&&date_returned="+x, true);
	xhttp.send();
}
