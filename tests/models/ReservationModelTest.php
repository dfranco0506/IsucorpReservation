<?php

namespace models;

use App\Models\ReservationModel;
use CodeIgniter\Test\CIUnitTestCase;
use phpDocumentor\Reflection\Types\This;

class ReservationModelTest extends CIUnitTestCase
{
    public function testGetReservationsWithAtLeastOneReservation()
    {
        $model = new ReservationModel();

        $result = $model->getReservations("date", "asc");

        $this->assertNotNull($result);
        $this->assertIsArray($result);
        $this->assertGreaterThan(0, count($result));
    }

    public function testGetReservationByIdWithNotExistId()
    {
        $model = new ReservationModel();
        $reservation_id = random_int(99999, 999999);

        $result = $model->getReservationById($reservation_id);

        $this->assertNull($result);

    }

    public function testGetReservationByIdWithExistId()
    {
        $model = new ReservationModel();
        $reservation = $model->getAllReservations()[0];

        $result = $model->getReservationById($reservation->getIdReservation());

        $this->assertNotNull($result);

    }
}
