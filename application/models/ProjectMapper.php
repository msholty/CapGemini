<?php

class Application_Model_ProjectMapper
{
    protected $_db_table;

    public function __construct()
    {
        //Instantiate the Table Data Gateway for the Project table
        $this->_db_table = new Application_Model_DbTable_Project();
    }

    public function save(Application_Model_Project $project_object)
    {
        //Create an associative array of the data you want to update
        $data = array(
                'name' => $project_object->name,
                'code' => $project_object->code,
                'phase' => $project_object->phase,
                'status' => $project_object->status,
                'accountable' => $project_object->accountable,
                'responsible' => $project_object->responsible,
                'etc_keeper' => $project_object->etc_keeper,
                'expense_approver' => $project_object->expense_approver
        );

        //Check if the Project object has an ID
        //if no, it means the Project is a new Project
        //if yes, then it means you're updating an old Project
        if( is_null($project_object->id) ) {
            $data['date_created'] = date('Y-m-d H:i:s');
            $this->_db_table->insert($data);
        }
        else {
            $this->_db_table->update(
                    $data,
                    array(
                            'id = ?' => $project_object->id
                    )
            );
        }
    }
    public function getProjectById($id)
    {
        //use the Table Gateway to find the row that
        //the id represents
        $result = $this->_db_table->find($id);
        //if not found, throw an exsception
        if( count($result) == 0 ) {
            throw new Exception('Project not found');
        }
        //if found, get the result, and map it to the
        //corresponding Data Object
        $row = $result->current();
        $project_object = new Application_Model_Project($row);
        //return the Project object
        return $project_object;
    }
    public function getProjects() {
        return $this->_db_table->fetchAll();
    }
}