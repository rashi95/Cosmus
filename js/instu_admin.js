function div_source_show() {
	div_bug_hide();
	document.getElementById('popup_source_help').style.display = "block";
}
function div_source_hide(){
	document.getElementById('popup_source_help').style.display = "none";
}

function div_bug_show() {
	div_source_hide();
	document.getElementById('popup_bug_help').style.display = "block";
}
function div_bug_hide(){
	document.getElementById('popup_bug_help').style.display = "none";
}
