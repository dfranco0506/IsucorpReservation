<?php namespace App\Models;

class DestinationModel extends BaseModel
{
	var $table = 'ddestination';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getAllDestinations() {
		return $this->em->getRepository('Entities\Destination')->findAll();
	}
}
