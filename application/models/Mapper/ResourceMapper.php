<?php

class Application_Model_ResourceMapper
{
    protected $_db_table;

    public function __construct()
    {
        //Instantiate the Table Data Gateway for the Person table
        $this->_db_table = new Application_Model_DbTable_Resource();
    }

    public function save(Application_Model_Resource $resource_object)
    {
        //Create an associative array
        //of the data you want to update
        $data = array(
                'first_name' => $resource_object->first_name,
        		'middle_name' => $resource_object->middle_name,
                'last_name' => $resource_object->last_name,
                'phone_number' => $resource_object->phone_number,
                'email' => $resource_object->email,
        		'resource_type' => $resource_object->resource_type,
        		'title' => $resource_object->title
        );
        //Check if the person object has an ID
        //if no, it means the person is a new person
        //if yes, then it means you're updating an old person
        if( is_null($resource_object->id) ) {
            $data['date_created'] = date('Y-m-d H:i:s');
            $this->_db_table->insert($data);
        } else {
            $this->_db_table->update($data, array('id = ?' => $resource_object->id));
        }
    }

    /* Returns Application_Model_Resource
     *
     */
    public function getResourceById($id)
    {
        //use the Table Gateway to find the row that
        //the id represents
        $result = $this->_db_table->find($id);
        //if not found, throw an exsception
        if( count($result) == 0 ) {
            throw new Exception('Resource not found');
        }
        //if found, get the result, and map it to the
        //corresponding Data Object
        $row = $result->current();
        $resource_object = new Application_Model_Resource($row);
        //return the Person object
        return $resource_object;
    }

    /* Returns Application_Model_Resource
     *
     */
    public function getResourceByName($firstName, $lastName) {
        // Get Zend_Db_Table_Select object
        $select = $_db_table->select();
        // Select a row where firstname and lastname match
        $select->where('firstName = ?', $firstName)
               ->where('lastName = ?', $lastName);
        // Fetch result set
        $row = $_db_table->fetchRow($select);
        $resource_object = new Application_Model_Resource($row);
        return $resource_object;
    }

    public function getResources() {
        return $this->_db_table->fetchAll();
    }
}

