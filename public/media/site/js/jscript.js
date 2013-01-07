/* lookupPerson is the function to call to open a new window to
 * lookup the person for the field.
 */
var myWindow;
var extra = '/capfire';
extra = '';

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
	var dotnav = document.getElementsByClassName('dot-nav')[0];
	if (!dotnav) {
		return;
	}
	var nav_links = document.getElementsByClassName('dot-nav')[0]
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

function parseHash() {
	// retrieve target page from URL:
	var page = window.location.hash.split("#")[1];
	// alert(page);

	// assuming you have a div with id "content"
	$("#card-deck").fadeOut("slow", function() { // executed when animation
		// complete
		$("#card-deck").empty();
		$("#card-deck").load("/" + page, function(response, status, x) {
			if (status == "error")
				$("#card-deck").load('/404');
			$("#card-deck").fadeIn("slow"); // bring it back in
		});
	});
}

/*
 * function parseHash() { alert('parshHash'); }
 */

$(function() {
	select_global_nav();
	select_dot_nav();
});

$(document).ready(function() {
	if (window.location.hash) { // Batteries included?!
		parseHash(); // Tweedle-dee
	}
	window.onhashchange = function() {
		// implemented elsewhere:
		parseHash(); // Tweedle-dum
	};
});

/** ***** jQueryUI stuff ******* */
/*
 * $(function() { $( "#tabs" ).tabs(); });
 */

/** ***** nav jscript ****** */
$(function() {
	// Project tabs
	$('#project-ajax-people').click(function(e) {
		loadAjax('projects', 'ajax-people', 'project-content');
	});
	$('#project-ajax-roles').click(function(e) {
		loadAjax('projects', 'ajax-roles', 'project-content');
	});
	$('#proejct-ajax-budget').click(function(e) {
		loadAjax('projects', 'ajax-budget', 'project-content');
	});
	$('#project-ajax-contracts').click(function(e) {
		loadAjax('projects', 'ajax-contracts', 'project-content');
	});

	// Resource tabs
	$('#profile-ajax-contact-information').click(function(e) {
		loadAjax('resources', 'ajax-contact-information', 'profile-content');
	});
	$('#profile-ajax-projects').click(function(e) {
		loadAjax('resources', 'ajax-projects', 'profile-content');
	});
	$('#profile-ajax-skills').click(function(e) {
		loadAjax('resources', 'ajax-skills', 'profile-content');
	});
	$('#profile-ajax-more-information').click(function(e) {
		loadAjax('resources', 'ajax-more-information', 'profile-content');
	});
});

function loadAjax(controller, action, content) {
	$(function() {
		document.getElementById(content).innerHTML = '<div id="ajax-container"><img id="ajax" src="https://s3.amazonaws.com/Capgemini/Avatars/ajax-loader.gif"/></div>';
		// get id of project
		var location = window.location.toString();
		var split = location.split('/');

		split.forEach(function(value, index, array) {
			if (value == 'id') {
				id = split[index + 1];
			}
		});

		var projectID = id;

		if (id.indexOf('#') >= 0) {
			projectID = id.substr(0, id.indexOf('#'));
		}

		$.ajax({
			type : 'POST',
			url : 'http://' + window.location.host + extra + '/' + controller
					+ '/' + action + '/',
			async : true,
			data : {
				projectID : projectID
			},
			success : function(data) {
				document.getElementById(content).innerHTML = data;
				//alert('http://' + window.location.host + extra + '/' + controller
					//+ '/' + action + '/');
			},
			error : function(data) {
				alert('http://' + window.location.host + extra + '/' + controller
						+ '/' + action + '/');
			}
		});
	});
}