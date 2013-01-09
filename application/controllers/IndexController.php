<?php

class IndexController extends Zend_Controller_Action
{
	public function init()
	{
		// init controller
	}


	public function indexAction()
	{
		$form = new Application_Form_Login(
				array(
						'action' => $this->view->baseUrl(),
						'submitLabel' => 'Login'
				)
		);

		//Check to see if the new project was submited
		if ($this->_request->getPost()) {
			//Get form data
			$formData = $this->_request->getPost();
			if ($form->isValid($formData)) {
				// check to see if login is valid
				$user = Application_Model_Document_User::all(
						array(
								'username' => $formData['username']
						)
				);

				if($user->password == $formData['pass'])

				//Redirect to project's view screen /people/view/:id
				$this->_redirect($this->view->baseUrl('/dashboard/'));
			}
		}

		$this->view->form = $form;

		// create login form
	}
}


