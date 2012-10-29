<?php
class Application_Model_Document_Project extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'Project';

	protected static $_requirements = array(
			'name' => 'Required',
			'code' => 'Required',
			'accountable' => array('Document:Resource', 'AsReference'),
			'responsible' => array('Document:Resource', 'AsReference'),
			'etc_keeper' => array('Document:Resource', 'AsReference'),
			'expense_approver' => array('Document:Resource', 'AsReference'),
			'phase' => array('Document:ProjectPhase', 'AsReference'),
			'status' => array('Document:ProjectStatus', 'AsReference'),
			'date_created' => array('Required', 'Validator:Date')
	);

	public function __construct() {
		return parent::__construct();
	}
}