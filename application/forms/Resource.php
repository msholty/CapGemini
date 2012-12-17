<?php

class Application_Form_Resource extends Zend_Form
{
    /* Options can contain
     * $options['submitLabel'] -> label for the button
     * $options['action'] -> target for the form
     */

    public function __construct($options = null) {
        parent::__construct($options);
        $this
        	->setAction($options['action']) //Action is a passed in option
            ->setMethod('post'); //Form is a POST form

        // Resource First Name field
        $first_name = new Zend_Form_Element_Text('first_name');
        $first_name
	        ->setAttrib('name', 'first_name')
	        ->setAttrib('required', 'true')
	        ->setAttrib('placeholder', 'First Name');

        // Resource Middle Name field
        $middle_name = new Zend_Form_Element_Text('middle_name');
        $middle_name
	        ->setAttrib('name', 'middle_name')
	        ->setAttrib('placeholder', 'Middle Name');

        // Resource Last Name field
        $last_name = new Zend_Form_Element_Text('last_name');
        $last_name
	        ->setAttrib('name', 'last_name')
	        ->setAttrib('required', 'true')
	        ->setAttrib('placeholder', 'Last Name');

        // Resource Last Name field
        $email = new Zend_Form_Element_Text('last_name');
        $email
        	->setAttrib('name', 'phone_number')
        	->setAttrib('required', 'true')
			->setAttrib('placeholder', 'Phone Number');

        // Resource Phone Number field (text)
        $phone_number = new Zend_Form_Element_Text('phone_number');
        $phone_number
        	->setAttrib('name', 'phone_number')
			->setAttrib('required', 'true')
        	->setAttrib('placeholder', 'Phone Number');

        // Resource Phone Number field (text)
        $email = new Zend_Form_Element_Text('email');
        $email
        	->setAttrib('name', 'resource_type')
        	->setAttrib('required', 'true')
        	->setAttrib('placeholder', 'Email');

        $resource_type = new Zend_Form_Element_Select('resource_type');
        $resource_type
        	->setAttrib('name', 'resource_type')
			->setAttrib('required', 'true')
			->setAttrib('placeholder', 'Resource Type');

        foreach (Application_Model_Document_ResourceType::all() as $c) {
        	$resource_type->addMultiOption($c->_id, $c->value);
        }

        $title = new Zend_Form_Element_Select('title');
        $title->setAttrib('name', 'resource_type')
        	  ->setAttrib('required', 'true')
              ->setAttrib('placeholder', 'Title');

        foreach (Application_Model_Document_ResourceTitle::all() as $c) {
        	$title->addMultiOption($c->_id, $c->value);
        }

        // Submit button
        $submit = new Zend_Form_Element_Button(
                'save',
                array(
                        'name' => 'Save',
                        'type' => 'submit',
                        'class' => 'pill-btn black-btn'
                )
        );

        //Add all the elements to the form
        $this->addElements(
            array(
                    $first_name,
            		$middle_name,
                    $last_name,
                    $phone_number,
            		$email,
            		$resource_type,
            		$title,
                    $submit
            )
        );
    }
}

