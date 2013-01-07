<?php
class ProjectsController extends Zend_Controller_Action
{

	public function init()
	{
	}

	public function indexAction()
	{
		//TODO: get the page number from the url
		$page = $this->getRequest()->getParam('page');

		// Get projects and store them in the view
		$projects = Application_Model_Document_Project::all();

		$this->view->projects = $projects;
		foreach($projects as $project) {
			$array[] = $project;
		}

		$paginator = Zend_Paginator::factory($array);
		$paginator->setCurrentPageNumber(intval($page));
		$paginator->setItemCountPerPage(18);
		$this->view->paginator = $paginator;
	}

	public function newAction()
	{
		$form = new Application_Form_Project(array(
				'action' => $this->view->baseUrl('/projects/new/'),
				'submitLabel' => 'Save'
		));

		//Check to see if the new project was submited
		if ($this->_request->getPost()) {
			//Get form data
			if ($form->isValid($this->_request->getPost())) {
				//Create a new project with post data
				$project = new Application_Model_Document_Project();
				$project->name = $form->getValue('name');
				$project->code = $form->getValue('code');
				$project->accountable = Application_Model_Document_Resource::find($form->getValue('accountable'));
				$project->responsible = Application_Model_Document_Resource::find($form->getValue('responsible'));
				$project->etc_keeper = Application_Model_Document_Resource::find($form->getValue('etc_keeper'));
				$project->expense_approver = Application_Model_Document_Resource::find($form->getValue('expense_approver'));
				$project->phase = Application_Model_Document_ProjectPhase::find($form->getValue('phase'));
				$project->status = Application_Model_Document_ProjectStatus::find($form->getValue('status'));
				$project->date_created = date('Y-m-d H:i:s');
				$project->save();

				//Redirect to project's view screen /contracts/new/pid/:id
				$this->_redirect($this->view->baseUrl('/contracts/new/pid/'.$project->_id));
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
			$this->_redirect($this->view->baseUrl('/projects/'));
			exit();
		}

		// store it in the view
		$this->view->id = $id;
		// fetch from DB
		$project = Application_Model_Document_Project::find($id);

		// store project in view
		$this->view->project = $project;

		$sow = $project->sow;
		$change_orders = $project->change_orders;
		$final_end_date = $sow->end_date;
		if(!is_null($change_orders)) {
			foreach($change_orders as $c) {
				$end_date_str = strtotime($c->end_date);
				$final_end_date_str = strtotime($final_end_date);

				if($end_date_str > $final_end_date_str) {
					$final_end_date = $c->end_date;
				}
			}
		}
		else {
			$final_end_date = strtotime($sow->end_date);
		}

		$this->view->end_date = $final_end_date;
		$this->view->change_orders = $change_orders;
	}

	public function editAction()
	{
		// Get id from url
		$id = $this->getRequest()->getParam('id');
		// Check to see if they specified id in the url and its a valid id
		if($id == null || !intval($id)) {
			// Redirect because to view a project, they have to specify one in the url
			$this->_redirect($this->view->baseUrl('/projects/'));
			exit();
		}

		//Get project from database
		$project = Application_Model_Document_Project::find($id);

		// Define the form
		$form = new Application_Form_Project(array(
				'action' => $this->view->baseUrl('/projects/edit/id/'.$id),
				'submitLabel' => 'Update'
		));

		//Check to see if the user has submited the form or just requesting it
		if ($this->_request->getPost()) { // Form is submited, now we populate proper database object to reflect changes
			// Get form data
			$formData = $this->_request->getPost();
			// Check if form is valid
			if ($form->isValid($formData)) {
				// Assign all the form values to our updateProject to save
				$project->name = $formData['name'];
				$project->code = $formData['code'];
				$project->accountable = Application_Model_Document_Resource::find($formData['accountable']);
				$project->responsible = Application_Model_Document_Resource::find($formData['responsible']);
				$project->etc_keeper = Application_Model_Document_Resource::find($formData['etc_keeper']);
				$project->expense_approver = Application_Model_Document_Resource::find($formData['expense_approver']);
				$project->phase = Application_Model_Document_ProjectPhase::find($formData['phase']);
				$project->status = Application_Model_Document_ProjectStatus::find($formData['status']);
				// Save the project
				$project->save();
				// Redirect to the view of the project
				$this->_redirect($this->view->baseUrl('/projects/view/id/'.$id));
				exit();
			}
			else {
				$form->populate($formData);
			}
		}

		$formData = array(
				'name' => $project->name,
				'code' => $project->code,
				'accountable' => $project->accountable->_id,
				'responsible' => $project->responsible->_id,
				'etc_keeper' => $project->etc_keeper->_id,
				'expense_approver' => $project->expense_approver->_id,
				'status' => $project->status->_id,
				'phase' => $project->phase->_id
		);

		$form->populate($formData);
		$this->view->form = $form;
	}

	public function deleteAction()
	{
		// Get id from url
		$pid = $this->getRequest()->getParam('pid');
		// Check to see if they specified id in the url and its a valid id
		if($pid == null || !intval($pid)) {
			// Redirect because to view a project, they have to specify one in the url
			$this->_redirect($this->view->baseUrl('/projects/'));
			exit();
		}

		$project = Application_Model_Document_Project::find($pid);
		$project->sow->delete();
		$this->_redirect($this->view->baseUrl('/projects/'));
	}

	public function ajaxPeopleAction() {
		//$this->_helper->viewRenderer->setNoRender(TRUE);
		//$id = $this->getRequest()->getParam('id');
		$this->_helper->layout->disableLayout();
		$data = $this->_request->getPost();
		$project = Application_Model_Document_Project::find($data['projectID']);
		$this->view->project = $project;
	}

	public function ajaxContractsAction() {
		$this->_helper->layout->disableLayout();
		$data = $this->_request->getPost();
		$project = Application_Model_Document_Project::find($data['projectID']);
		$this->view->project = $project;

		$sow = $project->sow;
		$change_orders = $project->change_orders;
		$final_end_date = $sow->end_date;
		if(!is_null($change_orders)) {
			foreach($change_orders as $c) {
				$end_date_str = strtotime($c->end_date);
				$final_end_date_str = strtotime($final_end_date);

				if($end_date_str > $final_end_date_str) {
					$final_end_date = $c->end_date;
				}
			}
		}
		else {
			$final_end_date = strtotime($sow->end_date);
		}

		$this->view->end_date = $final_end_date;
		$this->view->change_orders = $change_orders;
	}

	public function ajaxRolesAction() {
		$this->_helper->layout->disableLayout();
		$data = $this->_request->getPost();
		$project = Application_Model_Document_Project::find($data['projectID']);
		$this->view->project = $project;
	}

	public function ajaxBudgetAction() {
		$this->_helper->layout->disableLayout();
		$data = $this->_request->getPost();
		$project = Application_Model_Document_Project::find($data['projectID']);
		$this->view->project = $project;
	}
}



