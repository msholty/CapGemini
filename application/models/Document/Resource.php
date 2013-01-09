<?php
class Application_Model_Document_Resource extends Shanty_Mongo_Document
{
	protected static $_db = 'Capgemini';
	protected static $_collection = 'Resource';

	protected static $_requirements = array(
        'name' => array('Document:Application_Model_Document_Name', 'Required'),
        'name.first' => 'Required',
        'name.last' => 'Required',
		'email' => array('Document', 'Required'),
        'email.disney' => array('Required', 'Validator:EmailAddress'),
		'email.capgemini' => array('Required', 'Validator:EmailAddress'),
		'phone' => array('Document', 'Required'),
		'phone.disney' => 'Optional',
		'phone.capgemini' => 'Required',
		'address' => array('Document', 'Required'),
		'address.line1' => 'Required',
		'address.city' => 'Required',
		'address.state' => 'Required',
		'address.country' => 'Required',
		'date_created' => 'Required',
		'title' => array('Document:Application_Model_Document_ResourceTitle', 'AsReference'),
		'type' => array('Document:Application_Model_Document_ResourceType', 'AsReference'),
		'office_base' => array('Document:Application_Model_Document_OfficeBase', 'AsReference')
    );
}