<?php
	class Application_View_Helper_ProfileCard extends Zend_View_Helper_Abstract
	{
		public function profileCard()
		{
			echo <<<HTML
	<div class="card-container">
		<div class="card track-card everyday_activities flippy">
			<div class="card-front widget">
				<div class="widget-subsection card-splash-image">
					<img
						src="/media/site/img/content/test/ted.jpg">
				</div>

				<div class="widget-subsection card-title">
					<div class="content">
						<span>Teddy Bear</span>
					</div>
				</div>

				<div class="widget-subsection card-footer">
					<span class="emphasis">Senior Manager</span> US West TEST TEST TEST TEST TEST TEST
				</div>

			</div>

			<div class="card-back card-rotate widget">
				<div class="widget-subsection card-exercise-list">
					<ul>
						<li>Phone Number
							<div class="secondary">(765) 555-5555</div>
						</li>
						<li>Location
							<div class="secondary">San Diego</div>
						</li>
						<li>Email
							<div class="secondary">teddy.bear@capgemini.com</div>
						</li>
					</ul>
				</div>

				<div class="widget-subsection card-footer">
					<a
						class="white-btn pill-btn get_prompt from_static everyday_activities"
						href="/resources/view/id/5090262568a7fd3f0d000001/">View Profile</a>
				</div>

			</div>
		</div>
	</div>
HTML
		;}
	}
?>