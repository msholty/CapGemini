<?php

class ProjectsController extends Zend_Controller_Action
{

    protected $_redirector = null;

    public function init()
    {
        /* Initialize action controller here */
        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction()
    {
        // Create mapper object
        $project_mapper = new Application_Model_ProjectMapper();
        // Query for all projects, store in variable called $results
        $results = $project_mapper->getProjects();
        // Store the results in the view so it can render them with partials
        $this->view->results = $results;
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
                $project->accountable = $form->getValue('accountable');
                $project->responsible = $form->getValue('responsible');
                $project->etcKeeper = $form->getValue('etcKeeper');
                $project->expenseApprover = $form->getValue('expenseApprover');
                $project->dateCreated = date('Y-m-d H:i:s');

                //Insert into database
                $project_mapper = new Application_Model_ProjectMapper();
                $project_mapper->save($project);

                //Redirect to project's view screen /projects/view/id/:id
                $this->_redirect('/projects/view/id/'.$id);
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
        // store project in view
        $this->view->project = $result;
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
                $updateProject->etcKeeper = $formData['etcKeeper'];
                $updateProject->expenseApprover = $formData['expenseApprover'];
                // Save the project
                $project_mapper->save($updateProject);
                // Redirect to the view of the project
                $this->_redirect(
                    $this->url(
                        array(
                            'controller' => 'projects',
                            'action' => 'view',
                            'id' => $this->id
                        )
                    )
                );
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
            'etcKeeper' => $updateProject->etcKeeper,
            'expenseApprover' => $updateProject->expenseApprover
        );
        $form->populate($formData);
        $this->view->form = $form;
    }

    public function addBudgetAction()
    {
        $form = new Application_Form_AddBudget(
            array(
                'action' => '/projects/addBudget/id/'.$this->getRequest()->getParam('id')
            )
        );
        $this->view->form = $form;
    }


}









