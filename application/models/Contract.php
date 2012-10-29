<?php

class Application_Model_Contract
{
	//declare the Contract's attributes
	private $contract_id; //JSON ObjectID
	private $project_id; //JSON ObjectID reference
	private $spade_id;
	private $start_date;
	private $end_date;
	private $purchase_order;
	private $billing_type;
	private $contract_number;
	private $parent_contract_number;
	private $contract_type;
	private $date_created;

	//upon construction, map the values
	//from the $contract_row if available
	public function __construct($contract_row = null)
	{
		if( !is_null($contract_row) ) {
			$this->contract_id = $contract_row->contract_id;
			$this->project_id = $contract_row->project_id;
			$this->spade_id = $contract_row->spade_id;
			$this->start_date = $contract_row->start_date;
			$this->end_date = $contract_row->end_date;
			$this->purchase_order = $contract_row->purchase_order;
			$this->billing_type = $contract_row->billing_type;
			$this->contract_number = $contract_row->contract_number;
			$this->parent_contract_number = $contract_row->parent_contract_number;
			$this->contract_type = $contract_row->contract_type;
			$this->date_created = $contract_row->date_created;
		}
	}
	//magic function __set to set the
	//attributes of the Contract model
	public function __set($name, $value)
	{
		switch($name) {
			case 'contract_id':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->contract_id) ) {
					throw new Exception('Cannot update Contract\'s id!');
				}
				break;
			case 'date_created':
				//same goes for date_created
				if( !is_null($this->date_created) ) {
					throw new Exception('Cannot update Contract\'s date_created');
				}
				break;
		}
		//set the attribute with the value
		$this->$name = $value;
	}
	public function __get($name)
	{
		return $this->$name;
	}
}

