<?php

class ContractsController extends Zend_Controller_Action
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
    	$pid = $this->getRequest()->getParam('pid');
    	// Check to see if they specified id in the url and its a valid id

    	$project_mapper = new Application_Model_ProjectMapper();
    	$project_object = $project_mapper->getProjectById($pid);

        $form = new Application_Form_Contract(
    			array(
    					'action' => '/contracts/new/pid/'.$pid,
    					'project_id' => $pid
    			)
    	);

        //Check to see if the new contract was submited
        if ($this->_request->getPost()) {
        	//Get form data
        	$formData = $this->_request->getPost();
        	if ($form->isValid($formData)) {
        		//Create a new project with post data
        		$contract = new Application_Model_Contract();
        		$contract->project_id = intval($form->getValue('project_id'));
        		$contract->contract_id = intval($form->getValue('contract_id'));
        		$contract->spade_id = intval($form->getValue('spade_id'));
        		$contract->contract_number = $form->getValue('contract_number');
        		$contract->start_date = $formData['start_date'];
        		$contract->end_date = $formData['end_date'];
        		$contract->parent_contract_number = $form->getValue('parent_contract_number');
        		$contract->contract_type = $form->getValue('contract_type');
        		$contract->purchase_order = $form->getValue('purchase_order');
        		$contract->billing_type = $form->getValue('billing_type');
        		$contract->date_created = date('Y-m-d H:i:s');

        		//Insert into database
        		$contract_mapper = new Application_Model_ContractMapper();
        		$contract_mapper->save($contract);

        		//Redirect to project's view screen /projects/view/id/:id
        		$this->_redirect('/projects/view/id/'.$id);
        	}
        }

    	$this->view->form = $form;
    	$this->view->project = $project_object;
    }

    public function viewAction()
    {
    // get id from request (from url)
        $id = $this->getRequest()->getParam('id');
        // Check to see if they specified id in the url and its a valid id
        if($id == null || !intval($id)) {
            // Redirect because to view a project, they have to specify one in the url
            $this->_redirect('/projects/');
            exit();
        }

        $contract_mapper = new Application_Model_ContractMapper();
        $contract = $contract_mapper->getContractById($id);

        $this->view->contract = $contract;
        $this->view->contract_id = $id;
    }

    public function editAction()
    {
        // action body
    }


}







