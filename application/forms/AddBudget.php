<?php

class Application_Form_AddBudget extends Zend_Form
{

    public function __construct($options = null) {
        parent::__construct($options);

        $this->setAction($options['action']) //Action is a passed in option
             ->setMethod('post'); //Form is a POST form


        //Role Drop Down
        //Resource Text with Lookup Icon
        //Location Drop Down
        //Staffing Level Drop Down
        //ChargeOut Level Number
        //Expense Rate Text
        //Traveler Checkbox

        //Back Button
        //Add More Button
        //Save Budget Button
    }
}

