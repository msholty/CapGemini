<?php

class Application_Model_PersonMapper
{
    protected $_db_table;

    public function __construct()
    {
        //Instantiate the Table Data Gateway for the Person table
        $this->_db_table = new Application_Model_DbTable_Person();
    }

    public function save(Application_Model_Person $person_object)
    {
        //Create an associative array
        //of the data you want to update
        $data = array(
                'firstName' => $person_object->firstName,
                'lastName' => $person_object->lastName,
                'phoneNumber' => $person_object->phoneNumber,
                'email' => $person_object->email
        );
        //Check if the person object has an ID
        //if no, it means the person is a new person
        //if yes, then it means you're updating an old person
        if( is_null($person_object->id) ) {
            $data['date_created'] = date('Y-m-d H:i:s');
            $this->_db_table->insert($data);
        } else {
            $this->_db_table->update($data, array('id = ?' => $person_object->id));
        }
    }

    /* Returns Application_Model_Person
     *
     */
    public function getPersonById($id)
    {
        //use the Table Gateway to find the row that
        //the id represents
        $result = $this->_db_table->find($id);
        //if not found, throw an exsception
        if( count($result) == 0 ) {
            throw new Exception('Person not found');
        }
        //if found, get the result, and map it to the
        //corresponding Data Object
        $row = $result->current();
        $person_object = new Application_Model_Person($row);
        //return the Person object
        return $person_object;
    }

    /* Returns Application_Model_Person
     *
     */
    public function getPersonByName($firstName, $lastName) {
        // Get Zend_Db_Table_Select object
        $select = $_db_table->select();
        // Select a row where firstname and lastname match
        $select->where('firstName = ?', $firstName)
               ->where('lastName = ?', $lastName);
        // Fetch result set
        $row = $_db_table->fetchRow($select);
        $person_object = new Application_Model_Person($row);
        return $person_object;
    }
}

