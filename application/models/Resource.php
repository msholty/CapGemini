<?php
class Application_Model_Resource
{
    //declare the Person's attributes
    private $id;
    private $firstName;
    private $lastName;
    private $phoneNumber;
    private $email;
    private $dateCreated;
    //upon construction, map the values
    //from the $person_row if available
    public function __construct($person_row = null)
    {
        if( !is_null($person_row) && $person_row instanceof Zend_Db_Table_Row ) {
            $this->id = $person_row->id;
            $this->firstName = $person_row->firstName;
            $this->lastName= $person_row->lastName;
            $this->phoneNumber = $person_row->phoneNumber;
            $this->email = $person_row->email;
            $this->dateCreated = $person_row->dateCreated;
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