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
}

