<?php

class Application_Form_Contract extends Zend_Form
{

	public function __construct($options = null) {
		parent::__construct($options);

		$this->setAction($options['action'])		//Action is a passed in option
		->setMethod('post')							//Form is a POST form
		->setDecorators(array(
				array('ViewScript', array('viewScript' => 'form/contract.phtml'))
		));

		$project_id = new Zend_Form_Element_Hidden('project_id');
		$project_id->setValue($options['project_id']);

		// spade_id Text
		$spade_id = new Zend_Form_Element_Text('spade_id');
		$spade_id->setAttribs(array(
				'required' => true,
				'name' => 'spade_id',
				'placeholder' => 'Spade ID'))
				->setLabel('Spade ID:');
		// contract_number Text
		$contract_number = new Zend_Form_Element_Text('contract_number');
		$contract_number->setAttribs(array(
				'required' => true,
				'name' => 'contract_number',
				'placeholder' => 'Contract Number'))
				->setLabel('Contract Number:');
		// billing_type Select
		$billing_type = new Zend_Form_Element_Select('billing_type');
		$billing_type->setRequired(true)
		->setLabel('Billing Type:');

		foreach (Application_Model_Document_BillingType::all() as $c) {
			$billing_type->addMultiOption($c->_id, $c->value);
			if($c->default) {
				$billing_type->setValue($c->value);
			}
		}
		// purchase_order Text
		$purchase_order = new Zend_Form_Element_Text('purchase_order');
		$purchase_order->setAttribs(array(
				'required' => true,
				'name' => 'contract_number',
				'placeholder' => 'Purchase Order'))
				->setLabel('Purchase Order:');

		// parent_contract_number Text

		// contract_type Select (contract_type)
		$contract_type = new Zend_Form_Element_Select('contract_type');
		$contract_type->setRequired(true)
		->setLabel('Contract Type:');

		foreach (Application_Model_Document_ContractType::all() as $c) {
			$contract_type->addMultiOption($c->_id, $c->value);
			if($c->default = 1) {
				$contract_type->setValue($c->value);
			}
		}

		//Save Contract Button
		$submit = new Zend_Form_Element_Button('submit');
		$submit->setAttribs(
				array(
						'class' => 'pill-btn black-btn',
						'name' => 'Save',
						'type' => 'submit'
				))
				->setLabel('Submit');

		$this->addElements(
				array(
						$project_id,
						$spade_id,
						$contract_number,
						$billing_type,
						$purchase_order,
						$contract_type,
						$submit
				)
		);
	}
}

