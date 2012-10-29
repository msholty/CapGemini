<?php

class Application_Model_Document_ProjectRole extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'ProjectRole';

	protected static $_requirements = array(
			'value' => array('Required', 'Validator:Alnum')
	);
}

