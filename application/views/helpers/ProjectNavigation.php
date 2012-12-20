<?php
class Application_View_Helper_ProjectNavigation extends Zend_View_Helper_Abstract {

	function projectNavigation() {
		$html = <<<HTML
		<ul id="profile-nav" class="vert-nav">
			<li><a href="#" id="project-ajax-people">People</a></li>
			<li><a href="#" id="project-ajax-roles">Roles</a></li>
			<li><a href="#" id="project-ajax-budget">Budget</a></li>
			<li><a href="#" id="project-ajax-contracts">Contracts</a></li>
		</ul>
		<!--<div id="people">
        	<p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
    	</div>-->
HTML;

		return $html;
	}
}
?>