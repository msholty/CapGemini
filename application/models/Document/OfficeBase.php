<?php

class Application_Model_Document_OfficeBase extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'OfficeBase';

	protected static $_requirements = array(
			'city' => array('Required', 'Validator:Alnum'),
			'state' => array('Required', 'Validator:Alnum')
	);
}

