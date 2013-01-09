<?php
class Application_Form_BillingType extends Zend_Form
{
	public function __construct($options = null) {
		parent::__construct($options);

		$this->setAction($options['action'])		//Action is a passed in option
		->setMethod('post');						//Form is a POST form

		$billing_type = new Zend_Form_Element_Text('billing_type');
		$billing_type->setAttribs(
				array(
						'required' => true,
						'name' => 'billing_type',
						'placeholder' => 'Enter Billing Type'
				)
		);

		$submit = new Zend_Form_Element_Button('submit');
		$submit->setAttribs(
				array(
						'class' => 'pill-btn black-btn',
						'name' => 'Save',
						'type' => 'submit',
						'value' => $options['submitLabel']
				)
		);

		$this->addElements(
				array(
						$billing_type,
						$submit
				)
		);
	}
}