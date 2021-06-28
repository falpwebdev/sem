var loc = window.location;
var loc_to_string =loc.toString()
var loc_new = loc_to_string.includes("main.php");
var loc_new1 = loc_to_string.includes("cancel_certificate_page.php");
var loc_new2 = loc_to_string.includes("practice_training.php");
var loc_new3 = loc_to_string.includes("refresh_training.php");
var loc_new4 = loc_to_string.includes("user_management.php");
var loc_new5 = loc_to_string.includes("deployed.php");
var loc_new6 = loc_to_string.includes("content_page.php");
if (loc_new == true){
	document.getElementById("main_page").classList.add('active');
}else if (loc_new1 == true){
	document.getElementById("cancel_certificate_page").classList.add('active');
}else if (loc_new2 == true){
	document.getElementById("practice_training_page").classList.add('active');
}else if (loc_new3 == true){
	document.getElementById("refresh_training_page").classList.add('active');
}else if (loc_new4 == true){
	document.getElementById("user_management_page").classList.add('active');
}else if (loc_new5 == true){
	document.getElementById("deployed_page").classList.add('active');
}else if (loc_new6 == true){
	document.getElementById("content_page").classList.add('active');
}