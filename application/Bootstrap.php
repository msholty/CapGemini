<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
<<<<<<< HEAD
	protected function _initDoctype()
	{
		/*$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');*/
	}

	/**
	 * Initializes the Autoloader
	 */
	protected function _initAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(
				array(
						'namespace' => 'Default',
						'basePath'  => '/.apps/http/__default__/0/1.0-zdc/application',
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

	/**
	 * Set up the view helpers to use the "Default" namespace.
	 * @return null
	 */
	protected function _initDefaultViewHelpers()
	{
		/* @var $view Zend_View */
		$view = $this->bootstrap('view')->getResource('view');
		$view->addHelperPath(
				APPLICATION_PATH . '/views/helpers',
				'Application_View_Helper_'
		);
	}

	/**
	 * Init default controller action helpers
	 */
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

		//id = resource._id in database
		$route = new Zend_Controller_Router_Route(
				'resources/page/:page',
				array(
						'module'	 => 'default',
						'controller' => 'resources',
						'action'     => 'index'
				)
		);

		$router->addRoute('resources', $route);

		//id = project.id in database
		$route = new Zend_Controller_Router_Route(
				'projects/page/:page',
				array(
						'module'	 => 'default',
						'controller' => 'projects',
						'action'     => 'index'
				)
		);

		$router->addRoute('projects', $route);
	}
=======


>>>>>>> 5ac6f6a6818e4e45455749afe3e318b4ad33031e
}

