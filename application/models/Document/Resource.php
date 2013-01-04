<?php
class Application_Model_Document_Resource extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'Resource';

	protected static $_requirements = array(
        'name' => array('Document', 'Required'),
        'name.first' => 'Required',
        'name.last' => 'Required',
        'email.disney' => array('Required', 'Validator:EmailAddress'),
		'email.capgemini' => array('Required', 'Validator:EmailAddress'),
		'phone.capgemini' => 'Required',
		'date_created' => 'Required',
		'title' => array('Document:Application_Model_Document_ResourceTitle', 'AsReference'),
		'type' => array('Document:Application_Model_Document_ResourceType', 'AsReference')
    );
}