<?php

class Application_Model_Document_User extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'User';

	protected static $_requirements = array(
			'username' => array('Required', 'Validator:Alnum'),
			'password' => 'Required'
	);
}

