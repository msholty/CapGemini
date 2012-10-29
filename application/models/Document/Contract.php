<?php
class Application_Model_Document_Contract extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'Contract';

	protected static $_requirements = array(
			'project' => array('Document:Project', 'AsReference'),
			'spade_id' => array('Required', 'Validator:Alnum'),
			'start_date' => array('Required', 'Validator:Date'),
			'end_date' => array('Required', 'Validator:Date'),
			'purchase_order' => 'Required',
			'billing_type' => array('Document:BillingType', 'AsReference'),
			'contract_number' => array('Required', 'Validator:Alnum'),
			'parent_contract_number' => array('Required', 'Validator:Alnum'),
			'contract_type' => array('Document:ContractType', 'AsReference'),
			'date_created' => array('Required', 'Validator:Date')
	);

	public function __construct() {
		parent::__construct();
	}
}