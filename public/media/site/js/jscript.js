/* lookupPerson is the function to call to open a new window to
 * lookup the person for the field.
 */
var myWindow;

function lookup(w, h, textbox_id, type) {
	var left = (screen.width / 2) - (w / 2);
	var top = (screen.height / 2) - (h / 2);
	// create the window object
	myWindow = window.open('/Lookup/' + type + '/', '', 'width=' + w
			+ ',height=' + h + ', top=' + top + ', left=' + left);
	myWindow.name = textbox_id;
	myWindow.opener.name = "opener";
	// focus the window for the user to select something
	myWindow.focus();
}

/*
 * @param id - the id of the person (according to database) @param fullname -
 * full name of the person to fill into the textbox i.e. "Sholty, Michael"
 */
function sendSelection(id, fullname) {
	window.opener.document.getElementById(window.name).value = fullname;
	window.opener.document.getElementById(window.name + "_hidden").value = id;
	window.close();
}

function select_global_nav() {
	var nav_links = document.getElementById('global-title-bar')
			.getElementsByTagName('a');
	var selected = location.pathname;

	for ( var i = 0; i < nav_links.length; i++) {
		var link = nav_links[i].pathname;

		// fiddle IE's view of the link
		if (link.substring(0, 1) != '/')
			link = '/' + link;

		if (link == selected.substring(0, selected.indexOf('/', 2) + 1))
			nav_links[i].setAttribute('class', 'current');
	}
}

function select_dot_nav() {
	var nav_links = document.getElementsByClassName('dot-nav')[0].getElementsByTagName('a');
	var selected = location.pathname;

	for ( var i = 0; i < nav_links.length; i++) {
		var link = nav_links[i].pathname;

		// fiddle IE's view of the link
		if (link.substring(0, 1) != '/')
			link = '/' + link;

		if (link == selected.substring(0, selected.indexOf('/', 2) + 1))
			nav_links[i].setAttribute('class', 'current');
	}
}

function parseHash() {
    // retrieve target page from URL:
    var page = window.location.hash.split("#")[1];
    alert(page);

    // assuming you have a div with id "content"
    $("#card-deck").fadeOut("slow", function() { // executed when animation complete
         $("#card-deck").empty();
         $("#card-deck").load("/"+page,function(response, status, x) {
              if(status=="error") $("#card-deck").load('/404');
              $("#card-deck").fadeIn("slow"); // bring it back in
         });
    });
}

/*function parseHash() {
	alert('parshHash');
}*/

$(function() {
	select_global_nav();
	select_dot_nav();
});

$(document).ready(function() {
	if (window.location.hash) { // Batteries included?!
		parseHash(); // Tweedle-dee
	}
	window.onhashchange=function() {
		// implemented elsewhere:
		parseHash(); // Tweedle-dum
	};
});

/******* jQueryUI stuff ********/
$(function() {
    $( "#tabs" ).tabs();
});