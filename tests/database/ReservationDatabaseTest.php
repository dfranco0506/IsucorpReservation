<?php
	
	namespace database;
	
	use CodeIgniter\Test\CIDatabaseTestCase;
	
	class ReservationDatabaseTest extends CIDatabaseTestCase
	{
		public function setUp(): void {
			parent::setUp();
			// Extra code to run before each test
		}
		
//		public function testReservationModelFindAll() {
//			$model = new ReservationModel();
//
//			// Get every row created by ExampleSeeder
//			$objects = $model->findAll();
//
//			// Make sure the count is as expected
//			$this->assertCount(2, $objects);
//		}
		
//		public function testSoftDeleteLeavesRow() {
//			$model = new ExampleModel();
//			$this->setPrivateProperty($model, 'useSoftDeletes', true);
//			$this->setPrivateProperty($model, 'tempUseSoftDeletes', true);
//
//			$object = $model->first();
//			$model->delete($object->id);
//
//			// The model should no longer find it
//			$this->assertNull($model->find($object->id));
//
//			// ... but it should still be in the database
//			$result = $model->builder()->where('id', $object->id)->get()->getResult();
//
//			$this->assertCount(1, $result);
//		}
	}
