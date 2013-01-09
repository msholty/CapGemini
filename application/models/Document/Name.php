<?php
class Application_Model_Document_Name extends Shanty_Mongo_Document
{
	protected static $_requirements = array(
			'first' => 'Required',
			'last' => 'Required',
	);

	public function full()
	{
		return $this->first.' '.$this->last;
	}
}