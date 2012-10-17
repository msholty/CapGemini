<?php

class Application_Model_ProjectPhase
{
	//declare the resource_type's attributes
	private $phase;

	//upon construction, map the values
	//from the $resourceType_row if available
	public function __construct($phaseType_row = null)
	{
		if( !is_null($phaseType_row) && $phaseType_row instanceof Zend_Db_Table_Row ) {
			$this->phase = $phaseType_row->phase;
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

