<?php

class Application_Form_Project extends Zend_Form
{
    public function __construct($options = null) {
        parent::__construct($options);

        $this->setAction($options['action'])    //Action is a passed in option
             ->setMethod('post')                //Form is a POST form
        /*     ->setDecorators(array(
                array('ViewScript', array('viewScript' => 'project.phtml'))
        ))*/;

        // Project name field
        $name = new Zend_Form_Element_Text('name');
        $name->setRequired(true);

        // Project Code field
        $code = new Zend_Form_Element_Text('code');
        $code->setRequired(true);

        // Project Accountable field (text)
        $accountable = new Zend_Form_Element_Text('accountable');
        $accountable->setRequired(true);

        // Project Responsible field
        $responsible = new Zend_Form_Element_Text('responsible');
        $responsible->setRequired(true);

        // Project ETC Keeper field
        $etcKeeper = new Zend_Form_Element_Text('etcKeeper');
        $etcKeeper->setRequired(true);

        // Project Expense Approver field
        $expenseApprover = new Zend_Form_Element_Text('etcKeeper');
        $expenseApprover->setRequired(true);

        // Submit button
        $submit = new Zend_Form_Element_Button('save');
        $submit->setAttribs(
                array(
                        'class' => 'pill-btn black-btn',
                        'name' => 'Save',
                        'type' => 'submit'
                ));

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

