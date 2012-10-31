/* lookupPerson is the function to call to open a new window to
 * lookup the person for the field.
 */
var myWindow;

function lookup(w,h,textbox_id,type) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	//create the window object
	myWindow = window.open('/Lookup/'+type+'/','','width='+w+',height='+h+', top='+top+', left='+left);
	myWindow.name = textbox_id;
	myWindow.opener.name = "opener";
	//focus the window for the user to select something
	myWindow.focus();
}

/* @param id - the id of the person (according to database)
 * @param fullname - full name of the person to fill into the textbox i.e. "Sholty, Michael"
 */
function sendSelection(id, fullname) {
	window.opener.document.getElementById(window.name).value = fullname;
	window.opener.document.getElementById(window.name+"_hidden").value = id;
	window.close();
}

function setActive(element) {
	//alert('hi');
	document.getElementById(element).className += " active";
}

$(function() {
    $( "#tabs" ).tabs();
});

$(function() {
    $( "#accordion" )
        .accordion({
            header: "> div > h3"
        })
        .sortable({
            axis: "y",
            handle: "h3",
            stop: function( event, ui ) {
                // IE doesn't register the blur when sorting
                // so trigger focusout handlers to remove .ui-state-focus
                ui.item.children( "h3" ).triggerHandler( "focusout" );
            }
        });
});