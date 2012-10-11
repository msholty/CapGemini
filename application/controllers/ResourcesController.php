<?php

class ResourcesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Create mapper object
        $resource_mapper = new Application_Model_ResourceMapper();
        // Query for all resources, store in variable called $results
        $results = $resource_mapper->getResources();
        // Store the results in the view so it can render them with partials
        $this->view->results = $results;
    }

    public function newAction()
    {
        // action body
        $form = new Application_Form_Resource(
            array(
                'action' => '/people/new/',
                'submitLabel' => 'Save'
        ));

        //Check to see if the new project was submited
        if ($this->_request->getPost()) {
            //Get form data
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                //Create a new project with post data
                $Resource = new Application_Model_Resource();
                $Resource->firstName = $form->getValue('firstName');
                $Resource->lastName = $form->getValue('lastName');
                $Resource->phoneNumber = $form->getValue('phoneNumber');
                $Resource->email = $form->getValue('email');
                $Resource->dateCreated = date('Y-m-d H:i:s');

                //Insert into database
                $Resource_mapper = new Application_Model_ResourceMapper();
                $Resource_mapper->save($Resource);

                //Redirect to project's view screen /people/view/:id
                $this->_redirect('/people/view/id/'.$id);
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
            // Redirect because to view a Resource, they have to specify one in the url
            $this->_redirect('/people/');
            exit();
        }
    }

    public function editAction()
    {
        // action body
    }


}





