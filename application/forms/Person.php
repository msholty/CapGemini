<?php

class Application_Form_Person extends Zend_Form
{
    /* Options can contain
     * $options['submitLabel'] -> label for the button
     * $options['action'] -> target for the form
     */

    public function __construct($options = null) {
        parent::__construct($options);
        $this->setAction($options['action']) //Action is a passed in option
             ->setMethod('post'); //Form is a POST form

        // Person First Name field
        $firstName = new Zend_Form_Element_Text(
                'firstName',
                array(
                        'required' => true,
                        'placeholder' => 'First Name'
                )
        );
        // Person Last Name field
        $lastName = new Zend_Form_Element_Text(
                'lastName',
                array(
                        'required' => false,
                        'placeholder' => 'Last Name'
                )
        );
        // Person Last Name field
        $email = new Zend_Form_Element_Text(
                'lastName',
                array(
                        'required' => false,
                        'placeholder' => 'Last Name'
                )
        );
        // Person Phone Number field (text)
        $phoneNumber = new Zend_Form_Element_Text(
                'phoneNumber',
                array(
                        'required' => true,
                        'placeholder' => 'Phone Number'
                )
        );
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
                    $firstName,
                    $lastName,
                    $phoneNumber,
                    $submit
            )
        );
    }
}

