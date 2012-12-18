<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');
	}

	protected function _initAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(
				array(
						'namespace' => 'Default',
						'basePath'  => APPLICATION_PATH,
						'resourceTypes' => array(
								'module' => array(
										'namespace' => 'module_',
										'path' => 'modules/'
								),
						)
				)
		);
		return $autoloader;
	}

	protected function _initDefaultViewHelpers()
	{
		$view = $this->bootstrap('view')->getResource('view');
		$view->addHelperPath(
				APPLICATION_PATH . '/views/helpers',
				'Application_View_Helper_'
		);
	}

	protected function _initDefaultControllerActionHelpers()
	{
		Zend_Controller_Action_HelperBroker::addPath('controllers/helpers');
	}

	protected function _initRouter()
	{
		// Get Front Controller Instance
		$front = Zend_Controller_Front::getInstance();

		// Get Router
		$router = $front->getRouter();

		$route = new Zend_Controller_Router_Route(
				'capfire/:controller/',
				array(
						'module' 	=> 'default',
						'controller' => 'financials',
						'action'	=> 'index'
				)
		);

		$router->addRoute('financials', $route);

		//id = resource._id in database
		$route = new Zend_Controller_Router_Route(
				'capfire/resources/page/:page',
				array(
						'module'	 => 'default',
						'controller' => 'resources',
						'action'     => 'index'
				)
		);

		$router->addRoute('resources', $route);

		//id = project.id in database
		$route = new Zend_Controller_Router_Route(
				'capfire/projects/page/:page',
				array(
						'module'	 => 'default',
						'controller' => 'projects',
						'action'     => 'index'
				)
		);

		$router->addRoute('projects', $route);
	}
}

