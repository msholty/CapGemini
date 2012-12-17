<?php
class Application_Controller_Helper_ProjectEndDate extends Zend_Controller_Action_Helper_Abstract
{
	public function direct($id) {
		return findEndDate($id);
	}

	private function findEndDate($id) {
		$contract_mapper = new Application_Model_ContractMapper();
		$contracts = $contract_mapper->getContractsByProjectId($id);

		$final_end_date = '';

		foreach($contracts as $c) {
			$end_date_str = strtotime($c->end_date);
			$final_end_date_str = strtotime($final_end_date);

			if($end_date_str > $final_end_date_str) {
				$final_end_date = $c->end_date;
			}
		}
	}
}