/* lookupPerson is the function to call to open a new window to
 * lookup the person for the field.
 */
var myWindow;

function lookup(w,h,textbox_id,type) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	localStorage.textbox_id = textbox_id;
	//create the window object
	myWindow = window.open('http://localhost/Lookup/'+type+'/','','width='+w+',height='+h+', top='+top+', left='+left);
	myWindow.name = textbox_id;
	myWindow.opener.name = "opener";
	//focus the window for the user to select something
	myWindow.focus();
}

function sendSelection(id, name, fullname) {
	window.opener.document.getElementById(window.name).value = fullname;
	window.opener.document.getElementById("hidden_"+window.name).value = id;
	window.close();
}