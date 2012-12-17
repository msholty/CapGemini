<?php
class Application_View_Helper_ProfileNavigation extends Zend_View_Helper_Abstract {

	function profileNavigation() {
		$html = <<<HTML
		<ul id="profile-nav" class="vert-nav">
			<li><a href="#about" id="profile-basic-information-tab">Contact Information</a></li>
			<li><a href="#current-projects" id="profile-current-project-tab">Projects</a></li>
			<li><a href="#skills" id="profile-skills-tab">Skills</a></li>
			<li><a href="#moreinfo" id="profile-more-info-tab">More Information</a></li>
		</ul>
HTML;

		return $html;
	}
}