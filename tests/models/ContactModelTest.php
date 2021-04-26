<?php

namespace models;

use App\Models\ContactModel;
use CodeIgniter\Test\CIUnitTestCase;

class ContactModelTest extends CIUnitTestCase
{
    public function testGetAllContacts()
    {
        $model = new ContactModel();

        $result = $model->getAllContacts();

        $this->assertNotNull($result);
        $this->assertIsArray($result);
        $this->assertGreaterThan(0, count($result));
    }
}
