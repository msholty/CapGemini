<?php

class Application_Model_Document_BillingType extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'BillingType';

	protected static $_requirements = array(
			'value' => array('Required', 'Validator:Alnum')
	);
}

