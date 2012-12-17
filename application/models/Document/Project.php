<?php
class Application_Model_Document_Project extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'Project';

	protected static $_requirements = array(
			'name' => 'Required',
			'code' => 'Required',
			'accountable' => array('Document:Application_Model_Document_Resource', 'AsReference'),
			'responsible' => array('Document:Application_Model_Document_Resource', 'AsReference'),
			'etc_keeper' => array('Document:Application_Model_Document_Resource', 'AsReference'),
			'expense_approver' => array('Document:Application_Model_Document_Resource', 'AsReference'),
			'phase' => array('Document:Application_Model_Document_ProjectPhase', 'AsReference'),
			'status' => array('Document:Application_Model_Document_ProjectStatus', 'AsReference'),
			'sow' => array('Document:Application_Model_Document_Contract', 'AsReference'),
			'change_orders' => 'DocumentSet',
			'change_orders.$' => array('Document:Application_Model_Document_Contract', 'AsReference'),
			'date_created' => 'Required'
	);
}