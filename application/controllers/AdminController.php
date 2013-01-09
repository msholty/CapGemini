<?php

class AdminController extends Zend_Controller_Action
{
	public $formData;

	public function init()
	{
		// if it's an ajax call
		if(strstr($this->_request->getActionName(), 'ajax')) {
			$this->_helper->layout->disableLayout();
			$this->formData = $this->_request->getPost();
		}
	}

	public function indexAction()
	{
		// action body
	}

	public function ajaxBillingTypesAction() {
		$this->view->objects = Application_Model_Document_BillingType::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-billing-types/'),
						'submitLabel' => 'Add Billing Type',
						'placeholder' => 'Enter Billing Type'
				)
		);

		$this->view->form = $form;
		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['billing_type'])) {
				$object = new Application_Model_Document_BillingType();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxContractTypesAction() {
		$this->view->objects = Application_Model_Document_ContractType::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-contract-types/'),
						'submitLabel' =>  'Add Contract Type',
						'placeholder' => 'Enter Contract Type'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_ContractType();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxProjectPhasesAction() {
		$this->view->objects = Application_Model_Document_ProjectPhase::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-project-phases/'),
						'submitLabel' =>  'Add Project Phase',
						'placeholder' => 'Enter Project Phase'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_ProjectPhase();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxProjectRolesAction() {
		$this->view->objects = Application_Model_Document_ProjectRole::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-project-roles/'),
						'submitLabel' =>  'Add Project Role',
						'placeholder' => 'Enter Project Role'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_ProjectRole();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxProjectStatusAction() {
		$this->view->objects = Application_Model_Document_ProjectStatus::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-project-status/'),
						'submitLabel' =>  'Add Project Status',
						'placeholder' => 'Enter Project Status'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_ProjectStatus();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxResourceTitlesAction() {
		$this->view->objects = Application_Model_Document_ResourceTitle::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-resource-titles/'),
						'submitLabel' =>  'Add Resource Title',
						'placeholder' => 'Enter Resource Title'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_ResourceTitle();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxResourceTypesAction() {
		$this->view->objects = Application_Model_Document_ResourceType::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-resource-types/'),
						'submitLabel' =>  'Add Resource Type',
						'placeholder' => 'Enter Resource Type'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_ResourceType();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxOfficeBasesAction() {
		$this->view->objects = Application_Model_Document_OfficeBase::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-office-bases/'),
						'submitLabel' =>  'Add Office Base',
						'placeholder' => 'Enter Office Base'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				/*$object = new Application_Model_Document_OfficeBase();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;*/
			}
		}

		//$this->render('ajax-admin-object');
	}

	public function ajaxSkillsAction() {
		$this->view->objects = Application_Model_Document_Skill::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-skills/'),
						'submitLabel' =>  'Add Skill',
						'placeholder' => 'Enter Skill'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_Skill();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

	public function ajaxSkillRatingsAction() {
		$this->view->objects = Application_Model_Document_SkillRating::all();

		$form = new Application_Form_AdminObject(
				array(
						'action' => $this->view->baseUrl('/admin/ajax-skill-ratings/'),
						'submitLabel' =>  'Add Contract Type',
						'placeholder' => 'Enter Contract Type'
				)
		);

		$this->view->form = $form;

		// if adding a new document to collection
		if ($this->_request->getPost()) {
			//Get form data
			if (isset($this->formData['value'])) {
				$object = new Application_Model_Document_SkillRating();
				$object->value = $this->formData['value'];
				$object->save();

				$this->_redirect($this->view->baseUrl('/admin/'));
				break;
			}
		}

		$this->render('ajax-admin-object');
	}

}

