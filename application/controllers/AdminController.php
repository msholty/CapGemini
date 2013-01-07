<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function ajaxBillingTypesAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->billing_types = Application_Model_Document_BillingType::all();
    }

    public function ajaxContractTypesAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->contract_types = Application_Model_Document_ContractType::all();
    }

    public function ajaxProjectPhasesAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->project_phases = Application_Model_Document_ProjectPhase::all();
    }

    public function ajaxProjectRolesAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->project_roles = Application_Model_Document_ProjectRole::all();
    }

    public function ajaxProjectStatusAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->project_status = Application_Model_Document_ProjectStatus::all();
    }

    public function ajaxResourceTitlesAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->resource_titles = Application_Model_Document_ResourceTitle::all();
    }

    public function ajaxResourceTypesAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->resource_types = Application_Model_Document_ResourceType::all();
    }

    public function ajaxOfficeBasesAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->office_bases = Application_Model_Document_OfficeBase::all();
    }

    public function ajaxSkillsAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->skills = Application_Model_Document_Skill::all();
    }

    public function ajaxSkillRatingsAction() {
    	$this->_helper->layout->disableLayout();
    	$data = $this->_request->getPost();
    	$this->view->skill_ratings = Application_Model_Document_SkillRating::all();
    }

}

