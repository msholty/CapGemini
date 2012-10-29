<?php
class Application_Model_Mapper_Contract
{
	protected $_db_collection;

	public function __construct()
	{
		//Instantiate the Collection Data Gateway for the Contract Collection
		$this->_db_collection = new Application_Model_Document_Contract();
	}

	public function save(Application_Model_Document_Contract $contract)
	{
		//Create an associative array of the data you want to update
		$data = array(
				'_id' => $contract->_id,
				'project_id' => $contract->project_id,
				'spade_id' => $contract->spade_id,
				'start_date' => $contract->start_date,
				'end_date' => $contract->end_date,
				'purchase_order' => $contract->purchase_order,
				'billing_type' => $contract->billing_type,
				'contract_type' => $contract->contract_type,
				'contract_number' => $contract->contract_number,
				'parent_contract_number' => $contract->parent_contract_number,
				'date_created' => $contract->date_created
		);

		//Check if the Contract object has an ID
		//if no, it means the Contract is a new Contract
		//if yes, then it means you're updating an old Contract
		if( is_null($contract->_id) ) {
			$data['date_created'] = date('Y-m-d H:i:s');
			$this->_db_collection->insert($data);

			$user = new Application_Model_Document_Contract($data);
			$user->save();
		}
		else {
			$contract = Application_Model_Document_Contract::find($contract->id);
			$contract->save($data);
		}
	}

	/**
	 *
	 * Delete an entire document in the database
	 *
	 * @param    $id - the ObjectId to the document to be deleted
	 * @return   void
	 *
	 */
	public function delete($id) {
		if( !is_null( $contract = Application_Model_Document_Contract::find($id) ) ) {
			$contract->delete();
		}
		else {
			throw new Exception('Cannot delete contract. Id: ' . $id . ' doesn\'t exist');
		}
	}


	public function getContract($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		if( !is_null( $contract = Application_Model_Document_Contract::find($id) ) ) {
			return $contract;
		}
		else {
			throw new Exception('Cannot find contract. Id: ' . $id . ' doesn\'t exist');
		}
	}
	public function getContractsByProjectId($pid) {
		return Application_Model_Document_Contract::all(array('project_id._id' => $pid));
	}
	public function getSOW($pid) {
		$row = $this->_db_collection->fetchRow(
			$this->_db_collection
			->select()
			->where('project_id = ?', $pid)
			->where('contract_type = ?', 'SOW')
		);

		return $row;
	}

	public function getContracts() {
		return $this->_db_collection->fetchAll();
	}

	public function deleteContracts($id) {
		// select contracts where project_id=$id
		$where = $this->_db_collection->getAdapter()->quoteInto('project_id = ?', $id);
		$row = $this->_db_collection->delete($where);
	}
}