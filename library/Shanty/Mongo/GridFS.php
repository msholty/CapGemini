<?php

class Shanty_Mongo_GridFS extends Shanty_Mongo_Collection {
	// The grid storing
	// @obj MongoGridFS
	protected $_grid;

	public function __construct(Mongo $mongo = null, $database = 'Capgemini', $prefix = 'undefined') {
		if (null === $mongo) {
			$mongo = new Mongo();
		}

		// Collection will be prefix.files & prefix.chunks
		$this->_grid = $mongo->selectDB($database)->getGridFS($prefix);
	}

	public function storeUpload($input_name, $config) {
		$grid->storeUpload($input_name, $config);
	}
}

?>