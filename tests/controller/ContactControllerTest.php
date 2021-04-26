<?php

namespace controller;

use App\Models\ContactModel;
use CodeIgniter\Test\FeatureTestCase;

class ContactControllerTest extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @throws \CodeIgniter\Router\Exceptions\RedirectException
     * @throws \Exception
     */
    public function testDeleteNotExistContact()
    {
        $routes = [
            ['get', '/contact/delete/(:num)', 'ContactController::delete/$1']
        ];

        $contact_id = random_int(999999, 99999999);
        $result = $this->withRoutes($routes)
            ->get('contact/delete/' . $contact_id);

        $result->assertStatus(200);

        $url = $result->getRedirectUrl();
        $this->assertEquals(null, $url);
        $this->assertEquals(session()->getFlashdata()['error'], 'Contact not found');
    }
//
//    public function testDeleteContactHasNotReservation()
//    {
//        $routes = [
//            ['get', '/contact/delete/(:num)', 'ContactController::delete/$1']
//        ];
//        $model_contact = new ContactModel();
//        $contact = $model_contact->getAllContacts()[0];
//
//        $result = $this->withRoutes($routes)
//            ->delete('contact/delete/' . $contact->getIdContact());
//
//        $result->assertStatus(200);
//        $url = $result->getRedirectUrl();
//        $this->assertEquals(null, $url);
//        $this->assertContains($contact->getName(), $result);
//    }
}