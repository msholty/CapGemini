<?php

class IndexController extends Zend_Controller_Action
{
	public function init()
	{
		$ajaxContext = $this->_helper->getHelper('AjaxContext');
		$ajaxContext->addActionContext('list', 'html')
					->addActionContext('modify', 'html')
					->initContext();
	}


	public function indexAction()
	{
		// action body
	}

	public function listAction() {
		// pretend this is a sophisticated database query
		$data = array('red','green','blue','yellow');
		$this->view->data = $data;
	}
}


