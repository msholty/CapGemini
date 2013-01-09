<?php
class Application_Form_AdminObject extends Zend_Form
{
	/* $options['submitLabel'] -> the label for submit button
	 * $options['action'] -> the action for the form
	 * $options['placeholder'] -> the placeholder for the text input
	 */
	public function __construct($options = null) {
		parent::__construct($options);

		$this->setAction($options['action'])		//Action is a passed in option
			->setMethod('post');					//Form is a POST form

		$value = new Zend_Form_Element_Text('value');
		$value->setAttribs(
				array(
						'required' => true,
						'name' => 'value',
						'placeholder' => $options['placeholder']
				)
		)
		->setLabel($options['placeholder'].':');

		$submit = new Zend_Form_Element_Button('submit');
		$submit->setAttribs(
				array(
						'class' => 'pill-btn black-btn',
						'name' => 'submit',
						'type' => 'submit',
						'label' => $options['submitLabel']
				)
		)
		->setLabel($options['submitLabel']);

		$this->addElements(
				array(
						$value,
						$submit
				)
		);
	}
}