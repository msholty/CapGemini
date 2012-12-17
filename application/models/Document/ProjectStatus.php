<?php

class Application_Model_Document_ProjectStatus extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'ProjectStatus';

	protected static $_requirements = array(
			'value' => array('Required', 'Validator:Alnum')
	);
}

