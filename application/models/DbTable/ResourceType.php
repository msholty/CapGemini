<?php

class Application_Model_DbTable_ResourceType extends Zend_Db_Table_Abstract
{

    protected $_name = 'resource_type';

    public function findForSelect()
    {
    	$select = $this->select();
    	return $this->fetchAll($select);
    }
}

