<?php

use
	OSC\OurTeam\Collection
		as OurTeamCol,
	OSC\OurTeam\Object
		as OurTeamObj
;

class RestApiOurTeam extends RestApi {

	public function get($params){
		$col = new OurTeamCol();
		$params['GET']['id'] ? $col->filterById($params['GET']['id']) : '';
		$params['GET']['search_name'] ? $col->filterByName($params['GET']['search_name']) : '';
		// start limit page
		if($params['GET']['pagination']) {
			$showDataPerPage = 10;
			$start = $params['GET']['start'];
			$this->applyLimit($col,
				array(
					'limit' => array($start, $showDataPerPage)
				)
			);
		}

		return $this->getReturn($col, $params);
	}

	public function post($params){
		$obj = new OurTeamObj();
		$obj->setCreateBy($_SESSION['user_name']);
		$obj->setProperties( $params['POST'] );
		$obj->insert();
		$id = $obj->getId();
		return array(
			'data' => array(
				id => $id
			)
		);
	}

	public function put($params){
		$obj = new OurTeamObj();
		$obj->setId($this->getId());
		$obj->setCreateBy($_SESSION['user_name']);
		$obj->setProperties($params['PUT']);
		$obj->update();

		return array(
			'data' => array(
				'success' => 'true'
			)
		);

	}

	public function delete(){
		$obj = new OurTeamObj();
		$obj->setId($this->getId());
		$obj->delete();

		return array(
			'data' => array(
				'data' => 'success'
			)
		);

	}

}
