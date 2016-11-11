<?php

namespace OSC\OurTeam;

use
	Aedea\Core\Database\StdObject as DbObj
;

class Object extends DbObj {
			
	protected
		$name
		, $email
		, $address
		, $gender
		, $telephone
		, $summary
		, $photo
	;
	
	public function toArray( $params = array() ){
		$args = array(
			'include' => array(
				'id',
				'name',
				'email',
				'address',
				'gender',
				'status',
				'telephone',
				'summary',
				'photo',
			)
		);
	
		return parent::toArray($args);
	}
	
	public function load( $params = array() ){
		$q = $this->dbQuery("
			SELECT
				name,
				email,
				address,
				gender,
				status,
				telephone,
				photo,
				summary
			FROM
				our_team
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	
		if( ! $this->dbNumRows($q) ){
			throw new \Exception(
				"404: Our Team not found",
				404
			);
		}
	
		$this->setProperties($this->dbFetchArray($q));
	}


	public function insert(){
		$this->dbQuery("
			INSERT INTO
				our_team
			(
				name,
				email,
				address,
				gender,
				status,
				telephone,
				photo,
				summary,
				create_date,
				create_by
			)
				VALUES
			(
				'" . $this->getName() . "',
				'" . $this->getEmail() . "',
				'" . $this->getAddress() . "',
				'" . $this->getGender() . "',
				1,
				'" . $this->getTelephone() . "',
				'" . $this->getPhoto() . "',
				'" . $this->getSummary() . "',
				NOW(),
				'" . $this->getCreateBy() . "'
			)
		");
		$this->setId( $this->dbInsertId() );
	}

	public function updateStatus() {
		if( !$this->getId() ) {
			throw new Exception("save method requires id");
		}
		$this->dbQuery("
			UPDATE
				our_team
			SET
				status = '" .  $this->getStatus() . "',
				update_by = '" .  $this->getUpdateBy() . "'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	}


	public function delete() {

		if( !$this->getId() ) {
			throw new Exception("save method requires id");
		}
		$this->dbQuery("
			DELETE FROM
				our_team
			WHERE
				id = '" . (int)$this->getId() . "'
		");

	}



	public function update() {
	
		if( !$this->getId() ) {
			throw new Exception("save method requires id");
		}
	
		$this->dbQuery("
			UPDATE
				our_team
			SET
				name = '" . $this->dbEscape( $this->getName() ) . "',
				gender = '" . $this->dbEscape( $this->getGender() ) . "',
				photo = '" . $this->dbEscape( $this->getPhoto() ) . "',
				telephone = '" . $this->dbEscape( $this->getTelephone() ) . "',
				email = '" . $this->dbEscape( $this->getEmail() ) . "',
				summary = '" . (int)$this->getSummary() . "',
				address = '" . $this->dbEscape( $this->getAddress() ) . "',
				update_by = '" . $this->getUpdateBy() ."'
			WHERE
				id = '" . (int)$this->getId() . "'
		");
	
	}

	public function setName( $string ){
		$this->name = (string)$string;
	}

	public function getName(){
		return $this->name;
	}

	public function setGender( $string ){
		$this->gender = $string;
	}

	public function getGender(){
		return $this->gender;
	}

	public function setTelephone( $string ){
		$this->telephone = (string)$string;
	}

	public function getTelephone(){
		return $this->telephone;
	}

	public function setPhoto( $string ){
		$this->photo = (string)$string;
	}

	public function getPhoto(){
		return $this->photo;
	}

	public function setEmail( $string ){
		$this->email = (string)$string;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setSummary( $string ){
		$this->summary = (string)$string;
	}

	public function getSummary(){
		return $this->summary;
	}
	
	public function setAddress( $string ){
		$this->address = (string)$string;
	}
	
	public function getAddress(){
		return $this->address;
	}

}
