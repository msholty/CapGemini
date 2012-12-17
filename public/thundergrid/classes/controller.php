<?php

	class Controller {
		protected $grid;

		public function __construct(Mongo $mongo = null, $database = 'Capgemini') {
			if (null === $mongo) {
				$mongo = new Mongo();
			}

			$this->grid = $mongo->selectDB($database)->getGridFS('prefix');
		}
	}

?>