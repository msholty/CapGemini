<?php

class Application_Model_Document_ResourceTitle extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'ResourceTitle';

	protected static $_requirements = array(
			'value' => array('Required', 'Validator:Alnum')
	);
}

