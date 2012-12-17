<?php

class RolesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function newAction()
    {
        // Get project id from url
    	$cid = $this->getRequest()->getParam('cid');
    	// Check to see if they specified id in the url and its a valid id
    	if($cid == null || !intval($cid)) {
    		// Redirect because to view a project, they have to specify one in the url
    		$this->_redirect('/projects/');
    		exit();
    	}

    	$form = new Application_Form_Role(
    			array(
    					'action' => '/roles/new/id/'.$cid
    			)
    	);
    	$this->view->form = $form;

    	$project_mapper = new Application_Model_ProjectMapper();
    	$this->view->project = $project_mapper->getProjectById($cid);

    }

    public function viewAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }


}







