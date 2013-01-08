<?php

class Application_Form_Resource extends Zend_Form
{
    /* Options can contain
     * $options['submitLabel'] -> label for the button
     * $options['action'] -> target for the form
     */

    public function __construct($options = null) {
        parent::__construct($options);

        $this->setAction($options['action'])    //Action is a passed in option
        ->setMethod('post')                //Form is a POST form
        ->setDecorators(array(
        		array('ViewScript', array('viewScript' => 'form/resource.phtml'))
        ));

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

        // Resource Phone Number field (text)
        $phone_number = new Zend_Form_Element_Text('phone_number');
        $phone_number
        	->setAttrib('name', 'phone_number')
			->setAttrib('required', 'true')
        	->setAttrib('placeholder', 'Phone Number');

        // Resource Email Number field (text)
        $email = new Zend_Form_Element_Text('email');
        $email
        	->setAttrib('name', 'email')
        	->setAttrib('required', 'true')
        	->setAttrib('placeholder', 'Email');

        $resource_type = new Zend_Form_Element_Select('resource_type');
        $resource_type
        	->setAttrib('name', 'resource_type')
			->setAttrib('required', 'true');

        foreach (Application_Model_Document_ResourceType::all() as $c) {
        	$resource_type->addMultiOption($c->_id, $c->value);
        }

        $title = new Zend_Form_Element_Select('title');
        $title
        	->setAttrib('name', 'resource_type')
        	->setAttrib('required', 'true');

        foreach (Application_Model_Document_ResourceTitle::all() as $c) {
        	$title->addMultiOption($c->_id, $c->value);
        }

        $office_base = new Zend_Form_Element_Select('office_base');
        $office_base
        	->setAttrib('name', 'office_base')
        	->setAttrib('required', 'true');

        foreach (Application_Model_Document_OfficeBase::all() as $office) {
        	$office_base->addMultiOption($office->_id, $office->city . ', ' . $office->state . ', ' . $office->country);
        }

        // Submit button
        $submit = new Zend_Form_Element_Button('submit');
        $submit->setAttribs(
        		array(
        				'class' => 'pill-btn black-btn',
        				'name' => 'Save',
        				'type' => 'submit',
        				'label' => $options['submitLabel']
        		));

        $address1 = new Zend_Form_Element_Text('address1');
        $address1->setAttrib('placeholder', 'Address Line 1');
        $address2 = new Zend_Form_Element_Text('address2');
        $address2->setAttrib('placeholder', 'Address Line 2');
        $city = new Zend_Form_Element_Text('city');
        $city->setAttrib('placeholder', 'City');
        $state = new Zend_Form_Element_Text('state');
        $state->setAttrib('placeholder', 'State');
        $country = new Zend_Form_Element_Text('country');
        $country->setAttrib('placeholder', 'Country');

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
            		$office_base,
            		$address1,
            		$address2,
            		$city,
            		$state,
            		$country,
                    $submit
            )
        );
    }
}

