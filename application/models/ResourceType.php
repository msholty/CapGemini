<?php

class Application_Model_ResourceType
{
	//declare the resource_type's attributes
	private $type;

	//upon construction, map the values
	//from the $resourceType_row if available
	public function __construct($resourceType_row = null)
	{
		if( !is_null($resourceType_row) && $resourceType_row instanceof Zend_Db_Table_Row ) {
			$this->type = $resourceType_row->type;
		}
	}

	//magic function __set to set the
	//attributes of the resource type model
	public function __set($name, $value)
	{
		//set the attribute with the value
		$this->$name = $value;
	}

	public function __get($name)
	{
		return $this->$name;
	}
}

