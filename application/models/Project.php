<?php

class Application_Model_Project
{
    //declare the Project's attributes
    private $id;
    private $name;
    private $code;
    private $responsible;
    private $accountable;
    private $etcKeeper;
    private $expenseApprover;
    private $dateCreated;

    //upon construction, map the values
    //from the $project_row if available
    public function __construct($project_row = null)
    {
        if( !is_null($project_row) && $project_row instanceof Zend_Db_Table_Row ) {
            $this->id = $project_row->id;
            $this->name = $project_row->name;
            $this->code= $project_row->code;
            $this->responsible = $project_row->responsible;
            $this->accountable = $project_row->accountable;
            $this->etcKeeper = $project_row->etcKeeper;
            $this->expenseApprover = $project_row->expenseApprover;
            $this->dateCreated = $project_row->dateCreated;
        }
    }
    //magic function __set to set the
    //attributes of the Project model
    public function __set($name, $value)
    {
        switch($name) {
            case 'id':
                //if the id isn't null, you shouldn't update it!
                if( !is_null($this->id) ) {
                    throw new Exception('Cannot update Project\'s id!');
                }
                break;
            case 'dateCreated':
                //same goes for date_created
                if( !is_null($this->dateCreated) ) {
                    throw new Exception('Cannot update Project\'s dateCreated');
                }
                break;
        }
        //set the attribute with the value
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
}

