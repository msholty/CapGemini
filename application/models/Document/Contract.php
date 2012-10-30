<?php
class Application_Model_Document_Contract extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'Contract';

	protected static $_requirements = array(
			'project' => array('Document:Application_Model_Document_Project', 'AsReference'),
			'spade_id' => array('Required', 'Validator:Alnum'),
			'start_date' => array('Required', 'Validator:Date'),
			'end_date' => array('Required', 'Validator:Date'),
			'purchase_order' => 'Required',
			'billing_type' => array('Document:Application_Model_Document_BillingType', 'AsReference'),
			'contract_number' => array('Required', 'Validator:Alnum'),
			'contract_type' => array('Document:Application_Model_Document_ContractType', 'AsReference'),
			'date_created' => 'Required'
	);
}

class SOW extends Application_Model_Document_Contract
{
	protected static $_requirements = array(
			'email' => 'Required',
			'classes' => 'DocumentSet'
	);
}

class ChangeOrder extends Application_Model_Document_Contract
{
	protected static $_requirements = array(
			'obligations' => 'Array'
	);
}