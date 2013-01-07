<?php
class Application_View_Helper_AdminNavigation extends Zend_View_Helper_Abstract {

	function adminNavigation() {
		$html = <<<HTML
		<ul id="admin-nav" class="vert-nav">
			<li><a href="#" id="admin-ajax-billing-types">Billing Types</a></li>
			<li><a href="#" id="admin-ajax-contract-types">Contract Types</a></li>
			<li><a href="#" id="admin-ajax-project-phases">Project Phases</a></li>
			<li><a href="#" id="admin-ajax-project-roles">Project Roles</a></li>
			<li><a href="#" id="admin-ajax-project-status">Project Status</a></li>
			<li><a href="#" id="admin-ajax-resource-titles">Resource Titles</a></li>
			<li><a href="#" id="admin-ajax-resource-types">Resource Types</a></li>
			<li><a href="#" id="admin-ajax-office-bases">Office Bases</a></li>
			<li><a href="#" id="admin-ajax-skills">Skills</a></li>
			<li><a href="#" id="admin-ajax-skill-ratings">Skill Ratings</a></li>
		</ul>
HTML;

		return $html;
	}
}