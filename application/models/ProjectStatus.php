<?php

class Application_Model_ProjectStatus
{
	//declare the resource_type's attributes
	private $status;

	//upon construction, map the values
	//from the $resourceType_row if available
	public function __construct($statusType_row = null)
	{
		if( !is_null($statusType_row) && $statusType_row instanceof Zend_Db_Table_Row ) {
			$this->status = $statusType_row->status;
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

