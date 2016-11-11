<?php

namespace OSC\OurTeam;

use Aedea\Core\Database\StdCollection;

class Collection extends StdCollection {
	
	public function __construct( $params = array() ){
		parent::__construct($params);
		
		$this->addTable('our_team', 'ot');
		$this->idField = 'ot.id';
		$this->setDistinct(true);
		$this->objectType = __NAMESPACE__ .'\Object';
	}


	public function filterByStatus( $arg ){
		$this->addWhere("ot.status = '" . (int)$arg . "'");
	}

	public function filterById( $arg ){
		$this->addWhere("ot.id = '" . (int)$arg . "'");
	}

	public function filterByName( $arg ){
		$this->addWhere("ot.name LIKE '%" . $arg. "%' ");
	}

}
