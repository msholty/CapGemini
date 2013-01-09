<?php
class Application_Form_Login extends Zend_Form
{
	public function __construct($options = null) {
		parent::__construct($options);

		$this->setAction($options['action'])		//Action is a passed in option
		->setMethod('post');						//Form is a POST form

		$username = new Zend_Form_Element_Text('username');
		$username->setAttribs(
				array(
						'required' => true,
						'name' => 'username',
						'placeholder' => 'Username'
				)
		);
		$password = new Zend_Form_Element_Text('password');
		$password->setAttribs(
				array(
						'required' => true,
						'name' => 'password',
						'placeholder' => 'Password'
				)
		);

		$submit = new Zend_Form_Element_Button('submit');
		$submit->setAttribs(
				array(
						'class' => 'pill-btn black-btn',
						'name' => 'submit',
						'type' => 'submit',
						'label' => $options['submitLabel']
				)
		);

		$this->addElements(
				array(
						$username,
						$password,
						$submit
				)
		);
	}
}