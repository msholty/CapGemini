<?php

class PeopleController extends Zend_Controller_Action
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
        // action body
        $form = new Application_Form_Person(
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
                $person = new Application_Model_Person();
                $person->firstName = $form->getValue('firstName');
                $person->lastName = $form->getValue('lastName');
                $person->phoneNumber = $form->getValue('phoneNumber');
                $person->email = $form->getValue('email');
                $person->dateCreated = date('Y-m-d H:i:s');

                //Insert into database
                $person_mapper = new Application_Model_PersonMapper();
                $person_mapper->save($person);

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
            // Redirect because to view a person, they have to specify one in the url
            $this->_redirect('/people/');
            exit();
        }
    }

    public function editAction()
    {
        // action body
    }


}





