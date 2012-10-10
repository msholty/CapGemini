<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
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
            'Default_View_Helper_'
        );
    }

    protected function _initRouter()
    {
        // Get Front Controller Instance
        $front = Zend_Controller_Front::getInstance();

        // Get Router
        $router = $front->getRouter();

        //id = project.id in database
        $route = new Zend_Controller_Router_Route(
                'projects/view/:id',
                array(
                        'controller' => 'projects',
                        'action'     => 'view'
                )
        );

        //$router->addRoute('projects', $route);
    }
}

