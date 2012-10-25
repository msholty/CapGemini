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

		$table = new Application_Model_DbTable_Resource();
		foreach ($table->fetchAll() as $c) {
			$accountable->addMultiOption($c->id, $c->last_name . ', ' . $c->first_name);
			$responsible->addMultiOption($c->id, $c->last_name . ', ' . $c->first_name);
			$etc_keeper->addMultiOption($c->id, $c->last_name . ', ' . $c->first_name);
			$expense_approver->addMultiOption($c->id, $c->last_name . ', ' . $c->first_name);
		}

		/************ Conditional Elements **************/

		$phase = new Zend_Form_Element_Select('phase');
		$phase->setLabel('Phase:');

		$table = new Application_Model_DbTable_ProjectPhase();
		foreach ($table->fetchAll() as $c) {
			$phase->addMultiOption($c->phase, $c->phase);
			if($c->default) {
				$phase->setValue($c->phase);
			}
		}

		$status = new Zend_Form_Element_Select('status');
		$status->setLabel('Status:');

		$table = new Application_Model_DbTable_ProjectStatus();
		foreach ($table->fetchAll() as $c) {
			$status->addMultiOption($c->status, $c->status);
			if($c->default) {
				$status->setValue($c->status);
			}
		}


		/************ End Conditional Elements **********/

		// Submit button
		$submit = new Zend_Form_Element_Button('submit');
		$submit->setAttribs(
				array(
						'class' => 'pill-btn black-btn',
						'name' => 'Save',
						'type' => 'submit'
				))
			   ->setLabel('Next');

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

