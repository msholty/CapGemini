<?php

class Application_Form_Project extends Zend_Form
{
    public function __construct($options = null) {
        parent::__construct($options);

        $this->setAction($options['action']) //Action is a passed in option
             ->setMethod('post'); //Form is a POST form

        // Project name field
        $name = new Zend_Form_Element_Text(
            'name',
            array(
                'required' => true,
                'placeholder' => 'Project Name'
            )
        );
        // Project Code field
        $code = new Zend_Form_Element_Text(
            'code',
            array(
                'required' => false,
                'placeholder' => 'Project Code'
            )
        );
        // Project Accountable field (text)
        $accountable = new Zend_Form_Element_Text(
            'accountable',
            array(
                'required' => true,
                'placeholder' => 'Accountable'
            )
        );
        // Project Responsible field
        $responsible = new Zend_Form_Element_Text(
            'responsible',
            array(
                'required' => true,
                'placeholder' => 'Responsible'
            )
        );
        // Project ETC Keeper field
        $etcKeeper = new Zend_Form_Element_Text(
            'etcKeeper',
            array(
                'required' => true,
                'placeholder' => 'ETC Keeper'
            )
        );
        // Project Expense Approver field
        $expenseApprover = new Zend_Form_Element_Text(
            'expenseApprover',
            array(
                'required' => true,
                'placeholder' => 'Expense Approver'
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

        /**************** Hidden form fields ***************/
        // Project Accountable field (hidden)
        $accountable_hidden = new Zend_Form_Element_Hidden(
                'accountable_hidden',
                array(
                        'required' => true
                )
        );
        $accountable_hidden->setDecorators(array('ViewHelper'));
        // Project Responsible field (hidden)
        $responsible_hidden = new Zend_Form_Element_Hidden(
                'responsible_hidden',
                array(
                        'required' => true
                )
        );
        $responsible_hidden->setDecorators(array('ViewHelper'));
        // Project etcKeeper field (hidden)
        $etcKeeper_hidden = new Zend_Form_Element_Hidden(
                'etcKeeper_hidden',
                array(
                        'required' => true
                )
        );
        $etcKeeper_hidden->setDecorators(array('ViewHelper'));
        // Project Expense Approver field (hidden)
        $expenseApprover_hidden = new Zend_Form_Element_Hidden(
                'expenseApprover_hidden',
                array(
                        'required' => true
                )
        );
        $expenseApprover_hidden->setDecorators(array('ViewHelper'));
        /*************** End Hidden Fields ******************/


        //Add all the elements to the form
        $this->addElements(
            array(
                $name,
                $code,
                $accountable,
                $responsible,
                $etcKeeper,
                $expenseApprover,
                $accountable_hidden,
                $responsible_hidden,
                $etcKeeper_hidden,
                $expenseApprover_hidden,
                $submit
            )
        );
    }
}

