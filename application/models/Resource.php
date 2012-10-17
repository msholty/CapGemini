<?php
class Application_Model_Resource
{
    //declare the Person's attributes
    private $id;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $phone_number;
    private $email;
    private $resource_type;
    private $title;
    private $date_created;
    //upon construction, map the values
    //from the $resource_row if available
    public function __construct($resource_row = null)
    {
        if( !is_null($resource_row) && $resource_row instanceof Zend_Db_Table_Row ) {
            $this->id = $resource_row->id;
            $this->first_name = $resource_row->first_name;
            $this->middle_name = $resource_row->middle_name;
            $this->last_name= $resource_row->last_name;
            $this->phone_number = $resource_row->phone_number;
            $this->email = $resource_row->email;
            $this->resource_type = $resource_row->resource_type;
            $this->title = $resource_row->title;
            $this->date_created = $resource_row->date_created;
        }
    }
    //magic function __set to set the
    //attributes of the person model
    public function __set($name, $value)
    {
        switch($name) {
            case 'id':
                //if the id isn't null, you shouldn't update it!
                if( !is_null($this->id) ) {
                    throw new Exception('Cannot update Person\'s id!');
                }
                break;
            case 'dateCreated':
                //same goes for date_created
                if( !is_null($this->dateCreated) ) {
                    throw new Exception('Cannot update Person\'s dateCreated');
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