<?php
	
	namespace App\Models;
	
	use CodeIgniter\Model;
	
	class BaseModel extends Model
	{
		public $em;
		
		public function __construct() {
			parent::__construct();
			$this->em = service('doctrine');
		}
		
		/**
		 * @return mixed
		 */
		public function getEm() {
			return $this->em;
		}
		
		/**
		 * @param mixed $em
		 */
		public function setEm($em) {
			$this->em = $em;
		}
	}