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

    	$project = Application_Model_Document_Project::find($pid);

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
        		//Create a new contract with post data
        		$contract = new Application_Model_Document_Contract();
        		$contract->project = Application_Model_Document_Project::find($form->getValue('project_id'));
        		$contract->spade_id = intval($form->getValue('spade_id'));
        		$contract->contract_number = $form->getValue('contract_number');
        		$contract->start_date = $formData['start_date'];
        		$contract->end_date = $formData['end_date'];
        		$contract->parent_contract_number = $form->getValue('parent_contract_number');
        		$contract->contract_type = Application_Model_Document_ContractType::find($form->getValue('contract_type'));
        		$contract->purchase_order = $form->getValue('purchase_order');
        		$contract->billing_type = Application_Model_Document_BillingType::find($form->getValue('billing_type'));
        		$contract->date_created = date('Y-m-d H:i:s');
				$contract->save();
				if($contract->contract_type->value == 'SOW') {
					$project->sow = Application_Model_Document_Contract::find($contract->_id);
				}
				else {
					$project->change_orders->addDocument($contract);
				}
				$project->save();

        		//Redirect to project's view screen /projects/view/id/:id
        		$this->_redirect('/projects/view/id/'.$pid);
        	}
        }

    	$this->view->form = $form;
    	$this->view->project = $project;
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

        $this->view->contract = Application_Model_Document_Contract::find($id);
    }

    public function editAction()
    {
        // action body
    }


}







