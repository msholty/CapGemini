<?php
class Application_View_Helper_ProfileCard extends Zend_View_Helper_Abstract
{
	public function profileCard($resource, $baseUrl)
	{
		$html = <<<HTML
	<div class="card-container">
		<div class="card track-card everyday_activities flippy">
			<div class="card-front widget">
				<div class="widget-subsection card-splash-image">
					<img src="/media/site/img/content/test/ted.jpg">
				</div>

				<div class="widget-subsection card-title">
					<div class="content">
						<span>{$resource->name->first} {$resource->name->last}</span>
					</div>
				</div>

				<div class="widget-subsection card-footer">
					<span class="emphasis">{$resource->title->value}</span> US East<br>
					<span class="emphasis">{$resource->phoneNumber}</span> Test
				</div>

			</div>

			<div class="card-back card-rotate widget">
				<div class="widget-subsection card-exercise-list">
					<ul>
						<li>Resource Type
							<div class="secondary">{$resource->resource_type->value}</div>
						</li>
						<li>Location
							<div class="secondary">Orlando</div>
						</li>
						<li>Email
							<div class="secondary">{$resource->email}</div>
						</li>
					</ul>
				</div>

				<div class="widget-subsection card-footer">
					<a
						class="white-btn pill-btn get_prompt from_static everyday_activities"
						href="{$baseUrl}/resources/view/id/{$resource->_id}/">View Profile</a>
				</div>

			</div>
		</div>
	</div>
HTML;
		return $html;
	}

	function getAvatar() {
	}
}
?>