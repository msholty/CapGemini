<?php

class Application_Model_ContractMapper
{
	protected $_db_table;

	public function __construct()
	{
		//Instantiate the Table Data Gateway for the Contract table
		$this->_db_table = new Application_Model_DbTable_Contract();
	}

	public function save(Application_Model_Contract $contract_object)
	{
		//Create an associative array of the data you want to update
		$data = array(
				'contract_id' => $contract_object->contract_id,
				'project_id' => $contract_object->project_id,
				'spade_id' => $contract_object->spade_id,
				'start_date' => $contract_object->start_date,
				'end_date' => $contract_object->end_date,
				'purchase_order' => $contract_object->purchase_order,
				'billing_type' => $contract_object->billing_type,
				'contract_type' => $contract_object->contract_type,
				'contract_number' => $contract_object->contract_number,
				'parent_contract_number' => $contract_object->parent_contract_number,
				'date_created' => $contract_object->date_created
		);

		//Check if the Contract object has an ID
		//if no, it means the Contract is a new Contract
		//if yes, then it means you're updating an old Contract
		if( is_null($contract_object->id) ) {
			$data['date_created'] = date('Y-m-d H:i:s');
			$this->_db_table->insert($data);
		}
		else {
			$this->_db_table->update(
					$data,
					array(
							'id = ?' => $contract_object->id
					)
			);
		}
	}
	public function delete($id) {
		$where = $this->_db_table->getAdapter()->quoteInto('id = ?', $id);
		$this->_db_table->delete($where);
	}
	public function getContractById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('Contract not found');
		}
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$contract_object = new Application_Model_Contract($row);
		//return the Contract object
		return $contract_object;
	}
	public function getContractsByProjectId($pid) {
		// Fetch result set
		$rows = $this->_db_table->fetchAll(
				$this->_db_table->select()
				->where('project_id = ?', $pid)
		);
		return $rows;
	}
	public function getSOW($pid) {
		$row = $this->_db_table->fetchRow(
			$this->_db_table
			->select()
			->where('project_id = ?', $pid)
			->where('contract_type = ?', 'SOW')
		);

		return $row;
	}

	public function getContracts() {
		return $this->_db_table->fetchAll();
	}

	public function deleteContracts($id) {
		// select contracts where project_id=$id
		$where = $this->_db_table->getAdapter()->quoteInto('project_id = ?', $id);
		$row = $this->_db_table->delete($where);
	}
}