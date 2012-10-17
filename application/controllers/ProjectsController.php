<?php

class ProjectsController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        // Create mapper object
        $project_mapper = new Application_Model_ProjectMapper();
        // Store the results in the view so we can render them with partials
        $this->view->results = $project_mapper->getProjects();
    }

    public function newAction()
    {
        $form = new Application_Form_Project(array(
            'action' => '/projects/new/',
            'submitLabel' => 'Save'
        ));

        //Check to see if the new project was submited
        if ($this->_request->getPost()) {
            //Get form data
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                //Create a new project with post data
                $project = new Application_Model_Project();
                $project->name = $form->getValue('name');
                $project->code = $form->getValue('code');
                $project->accountable = intval($form->getValue('accountable'));
                $project->responsible = intval($form->getValue('responsible'));
                $project->etc_keeper = intval($form->getValue('etc_keeper'));
                $project->expense_approver = intval($form->getValue('expense_approver'));
                $project->date_created = date('Y-m-d H:i:s');

                //Insert into database
                $project_mapper = new Application_Model_ProjectMapper();
                $pid = $project_mapper->save($project);

                //Redirect to project's view screen /contracts/new/pid/:id
                $this->_redirect('/contracts/new/pid/'.$pid);
            }
        }

        $this->view->form = $form;
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

        // store it in the view
        $this->view->id = $id;
        // fetch from DB
        $project_mapper = new Application_Model_ProjectMapper();
        $result = $project_mapper->getProjectById($id);

        // get the people from fields and find their names
        $resource_mapper = new Application_Model_ResourceMapper();
        $this->view->accountable 		= 	$resource_mapper->getResourceById($result->accountable);
        $this->view->responsible 		= 	$resource_mapper->getResourceById($result->responsible);
        $this->view->etc_keeper 		= 	$resource_mapper->getResourceById($result->etc_keeper);
        $this->view->expense_approver 	= 	$resource_mapper->getResourceById($result->expense_approver);
        // store project in view
        $this->view->project = $result;

        $contract_mapper = new Application_Model_ContractMapper();
        // Store the results in the view so we can render them with partials
        $this->view->contracts = $contract_mapper->getContractsByProjectId($id);
    }

    public function editAction()
    {
        // Get id from url
        $id = $this->getRequest()->getParam('id');
        // Check to see if they specified id in the url and its a valid id
        if($id == null || !intval($id)) {
            // Redirect because to view a project, they have to specify one in the url
            $this->_redirect('/projects/');
            exit();
        }

        //Get project from database
        $project_mapper = new Application_Model_ProjectMapper();
        $updateProject = $project_mapper->getProjectById($id);

        // Define the form
        $form = new Application_Form_Project(array(
            'action' => '/projects/edit/id/'.$id,
            'submitLabel' => 'Update'
        ));

        //Check to see if the user has submited the form or just requesting it
        if ($this->_request->getPost()) { // Form is submited, now we populate proper database object to reflect changes
            // Get form data
            $formData = $this->_request->getPost();
            // Check if form is valid
            if ($form->isValid($formData)) {
                // Assign all the form values to our updateProject to save
                $updateProject->name = $formData['name'];
                $updateProject->code = $formData['code'];
                $updateProject->accountable = $formData['accountable'];
                $updateProject->responsible = $formData['responsible'];
                $updateProject->etc_keeper = $formData['etc_keeper'];
                $updateProject->expense_approver = $formData['expense_approver'];
                $updateProject->phase = $formData['phase'];
                $updateProject->status = $formData['status'];
                // Save the project
                $project_mapper->save($updateProject);
                // Redirect to the view of the project
                $this->_redirect('/projects/view/id/'.$id);
                exit();
            }
            else {
                $form->populate($formData);
            }
        }

        $formData = array(
            'name' => $updateProject->name,
            'code' => $updateProject->code,
            'accountable' => $updateProject->accountable,
            'responsible' => $updateProject->responsible,
            'etc_keeper' => $updateProject->etc_keeper,
            'expense_approver' => $updateProject->expense_approver,
        	'status' => $updateProject->status,
        	'phase' => $updateProject->phase
        );
        $form->populate($formData);
        $this->view->form = $form;
    }

    public function deleteAction()
    {
    	// Get id from url
    	$id = $this->getRequest()->getParam('id');
    	// Check to see if they specified id in the url and its a valid id
    	if($id == null || !intval($id)) {
    		// Redirect because to view a project, they have to specify one in the url
    		$this->_redirect('/projects/');
    		exit();
    	}

    	//Get project from database
    	$project_mapper = new Application_Model_ProjectMapper();
    	$project_mapper->delete($id);
    	$this->_redirect('/projects/');
		/*echo "delete1";
    	if ($this->_request->getPost()) {
    		$project_mapper->delete($id);
    		$this->_redirect('/projects/');
    	}

    	$deleteProject = $project_mapper->getProjectById($id);
    	$this->view->project = $deleteProject;*/
    }

    public function addBudgetAction()
    {
    	// Get project id from url
    	$pid = $this->getRequest()->getParam('pid');
    	// Check to see if they specified id in the url and its a valid id
    	if($pid == null || !intval($pid)) {
    		// Redirect because to view a project, they have to specify one in the url
    		$this->_redirect('/contracts/');
    		exit();
    	}

    	$form = new Application_Form_AddBudget(
    			array(
    					'action' => '/projects/addBudget/id/'.$pid
    			)
    	);
    	$this->view->form = $form;
    }
}



