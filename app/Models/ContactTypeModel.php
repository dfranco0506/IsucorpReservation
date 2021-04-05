<?php namespace App\Models;

class ContactTypeModel extends BaseModel
{
	var $table = 'ncontacttype';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getAllContactTypes() {
		return $this->em->getRepository('Entities\ContactType')->findAll();
	}
}
