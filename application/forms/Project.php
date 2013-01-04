<?php

class Application_Form_Project extends Zend_Form
{
	public function __construct($options = null) {
		parent::__construct($options);

		$this->setAction($options['action'])    //Action is a passed in option
			 ->setMethod('post')                //Form is a POST form
			 ->setDecorators(array(
				array('ViewScript', array('viewScript' => 'form/project.phtml'))
			 ));

		// Project name field
		$name = new Zend_Form_Element_Text('name');
		$name->setAttribs(array(
				'required' => true,
				'name' => 'name',
				'placeholder' => 'Name'))
			 ->setLabel('Name:');

			 // Project Code field
		$code = new Zend_Form_Element_Text('code');
		$code->setAttrib('placeholder', 'Code')
		->setAttrib('required', 'true')
		->setLabel('Code:');

		// Project Accountable field (text)
		$accountable = new Zend_Form_Element_Select('accountable');
		$accountable->setRequired(true)
		->setLabel('Accountable:');

		// Project Responsible field
		$responsible = new Zend_Form_Element_Select('responsible');
		$responsible->setRequired(true)
		->setLabel('Responsible:');

		// Project ETC Keeper field
		$etc_keeper = new Zend_Form_Element_Select('etc_keeper');
		$etc_keeper->setRequired(true)
		->setLabel('ETC Keeper:');


		// Project Expense Approver field
		$expense_approver = new Zend_Form_Element_Select('expense_approver');
		$expense_approver->setRequired(true)
		->setLabel('Expense Approver:');

		$collection = Application_Model_Document_Resource::all();
		foreach ($collection as $c) {
			$accountable->addMultiOption($c->_id, $c->name->last . ', ' . $c->name->first);
			$responsible->addMultiOption($c->_id, $c->name->last . ', ' . $c->name->first);
			$etc_keeper->addMultiOption($c->_id, $c->name->last . ', ' . $c->name->first);
			$expense_approver->addMultiOption($c->_id, $c->name->last . ', ' . $c->name->first);
		}

		/************ Conditional Elements **************/

		$phase = new Zend_Form_Element_Select('phase');
		$phase->setLabel('Phase:');

		foreach (Application_Model_Document_ProjectPhase::all() as $c) {
			$phase->addMultiOption($c->_id, $c->value);
			if($c->default) {
				$phase->setValue($c->value);
			}
		}

		$status = new Zend_Form_Element_Select('status');
		$status->setLabel('Status:');

		foreach (Application_Model_Document_ProjectStatus::all() as $c) {
			$status->addMultiOption($c->_id, $c->value);
			if($c->default) {
				$status->setValue($c->value);
			}
		}


		/************ End Conditional Elements **********/

		// Submit button
		$submit = new Zend_Form_Element_Button('submit');
		$submit->setAttribs(
				array(
						'class' => 'pill-btn black-btn',
						'name' => 'Save',
						'type' => 'submit',
						'label' => $options['submitLabel']
				));
			   //->setLabel($options['submitLabel']);

		//Add all the elements to the form
		$this->addElements(
				array(
						$name,
						$code,
						$accountable,
						$responsible,
						$etc_keeper,
						$expense_approver,
						$phase,
						$status,
						$submit
				)
		);
	}
}

