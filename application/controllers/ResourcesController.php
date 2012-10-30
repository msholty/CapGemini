<?php

class ResourcesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Store the resources in the view so it can render them with partials
        $this->view->resources = Application_Model_Document_Resource::all();
    }

    public function newAction()
    {
        // action body
        $form = new Application_Form_Resource(
            array(
                'action' => '/resources/new/',
                'submitLabel' => 'Save'
        ));

        //Check to see if the new project was submited
        if ($this->_request->getPost()) {
            //Get form data
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                //Create a new project with post data
                $resource = new Application_Model_Resource();
                $resource->first_name = $form->getValue('first_name');
                $resource->middle_name = $form->getValue('middle_name');
                $resource->last_name = $form->getValue('last_name');
                $resource->phone_number = $form->getValue('phone_number');
                $resource->email = $form->getValue('email');
                $resource->resource_type = $form->getValue('resource_type');
                $resource->title = $form->getValue('title');
                $resource->date_created = date('Y-m-d H:i:s');

                //Insert into database
                $resource_mapper = new Application_Model_ResourceMapper();
                $resource_mapper->save($resource);

                //Redirect to project's view screen /people/view/:id
                $this->_redirect('/resources/view/id/'.$id);
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
            $this->_redirect('/resources/');
            exit();
        }

        // Get the resource from the database
        $resource_mapper = new Application_Model_ResourceMapper();
        $resource = $resource_mapper->getResourceById($id);
        $this->view->resource = $resource;
    }

    public function editAction()
    {
		// Get id from url
        $id = $this->getRequest()->getParam('id');
        // Check to see if they specified id in the url and its a valid id
        if($id == null || !intval($id)) {
            // Redirect because to view a project, they have to specify one in the url
            $this->_redirect('/resources/');
            exit();
        }

        //Get project from database
        $resource_mapper = new Application_Model_ResourceMapper();
        $updateResource = $resource_mapper->getResourceById($id);

        // Define the form
        $form = new Application_Form_Resource(array(
            'action' => '/resources/edit/id/'.$id,
            'submitLabel' => 'Update'
        ));

        //Check to see if the user has submited the form or just requesting it
        if ($this->_request->getPost()) { // Form is submited, now we populate proper database object to reflect changes
            // Get form data
            $formData = $this->_request->getPost();
            // Check if form is valid
            if ($form->isValid($formData)) {
                // Assign all the form values to our updateProject to save
                $updateResource->first_name = $formData['first_name'];
                $updateResource->middle_name = $formData['middle_name'];
                $updateResource->last_name = $formData['last_name'];
                $updateResource->phone_number = $formData['phone_number'];
                $updateResource->email = $formData['email'];
                $updateResource->resource_type= $formData['resource_type'];
                $updateResource->title = $formData['title'];

                // Save the project
                $resource_mapper->save($updateResource);
                // Redirect to the view of the project
                $this->_redirect('/resources/view/id/'.$id);
                exit();
            }
            else {
                $form->populate($formData);
            }
        }

        $formData = array(
            'first_name' => $updateResource->first_name,
            'middle_name' => $updateResource->middle_name,
            'last_name' => $updateResource->last_name,
            'phone_number' => $updateResource->phone_number,
            'email' => $updateResource->email,
            'resource_type' => $updateResource->resource_type,
        	'title' => $updateResource->title
        );
        $form->populate($formData);
        $this->view->form = $form;
    }

    public function deleteAction()
    {
        // action body
    }


}







