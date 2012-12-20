<?php
class Application_View_Helper_ProfileNavigation extends Zend_View_Helper_Abstract {

	function profileNavigation() {
		$html = <<<HTML
		<ul id="profile-nav" class="vert-nav">
			<li><a href="#contact-information" id="profile-ajax-contact-information">Contact Information</a></li>
			<li><a href="#projects" id="profile-ajax-projects">Projects</a></li>
			<li><a href="#skills" id="profile-ajax-skills">Skills</a></li>
			<li><a href="#more-information" id="profile-ajax-more-information">More Information</a></li>
		</ul>
HTML;

		return $html;
	}
}