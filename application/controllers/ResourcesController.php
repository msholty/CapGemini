<?php

class ResourcesController extends Zend_Controller_Action
{
	/* The tab currently chosen */
	private $current_header_nav;

	public function init()
	{
		/* Initialize action controller here */
		$current_header_nav = 'resources';
	}

	public function indexAction()
	{
		//TODO: get the page number from the url
		$page = $this->getRequest()->getParam('page');

		$resources = Application_Model_Document_Resource::all();
		// Store the resources in the view so it can render them with partials
		$this->view->resources = $resources;
		foreach($resources as $resource) {
			$array[] = $resource;
		}
		$paginator = Zend_Paginator::factory($array);
		$paginator->setCurrentPageNumber(intval($page));
		$paginator->setItemCountPerPage(8);
		$this->view->paginator = $paginator;
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
			if ($form->isValid($this->_request->getPost())) {
				//Create a new project with post data
				$resource = new Application_Model_Document_Resource();
				$resource->name->first = $form->getValue('first_name');
				$resource->name->middle = $form->getValue('middle_name');
				$resource->name->last = $form->getValue('last_name');
				$resource->phone_number = $form->getValue('phone_number');
				$resource->email = $form->getValue('email');
				$resource->resource_type = Application_Model_Document_ResourceType::find($form->getValue('resource_type'));
				$resource->title = Application_Model_Document_ResourceTitle::find($form->getValue('title'));
				$resource->date_created = date('Y-m-d H:i:s');
				$resource->save();

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
		$this->view->resource = Application_Model_Document_Resource::find($id);
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

		// Define the form
		$form = new Application_Form_Resource(array(
				'action' => '/resources/edit/id/'.$id,
				'submitLabel' => 'Update'
		));

		$resource = Application_Model_Document_Resource::find($id);

		//Check to see if the user has submited the form or just requesting it
		if ($this->_request->getPost()) { // Form is submited, now we populate proper database object to reflect changes
			// Check if form is valid
			if ($form->isValid($this->_request->getPost())) {
				// Assign all the form values to our updateProject to save
				$resource->name->first = $form->getValue('first_name');
				$resource->name->middle = $form->getValue('middle_name');
				$resource->name->last = $form->getValue('last_name');
				$resource->phone_number = $form->getValue('phone_number');
				$resource->email = $form->getValue('email');
				$resource->resource_type= Application_Model_Document_ResourceType::find($form->getValue('resource_type'));
				$resource->title = Application_Model_Document_ResourceTitle::find($form->getValue('title'));
				$resource->save();
				// Redirect to the view of the project
				$this->_redirect('/resources/view/id/'.$id);
				exit();
			}
			else {
				$form->populate($formData);
			}
		}

		$formData = array(
				'first_name' => $resource->name->first,
				'middle_name' => $resource->name->middle,
				'last_name' => $resource->name->last,
				'phone_number' => $resource->phone_number,
				'email' => $resource->email,
				'resource_type' => $resource->resource_type->value,
				'title' => $resource->title->value
		);
		$form->populate($formData);
		$this->view->form = $form;
	}

	public function deleteAction()
	{
		// action body
	}


}







