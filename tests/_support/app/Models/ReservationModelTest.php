<?php
	
	namespace Tests\Support\app\Models;
	
	use App\Models\ReservationModel;
	use CodeIgniter\Test\CIUnitTestCase;
	
	class ReservationModelTest extends CIUnitTestCase
	{
		public function testGetReservations() {
			$model = new ReservationModel();
			
			$result = $model->getReservations("date", "asc");
			
		}
	}
