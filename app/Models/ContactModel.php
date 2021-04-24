<?php namespace App\Models;

use DateTime;
use Entities\Contact;

class ContactModel extends BaseModel
{
    var $table = 'dcontact';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllContacts()
    {
        return $this->em->getRepository('Entities\Contact')->findAll();
    }

    public function getContactCount()
    {
        $query = $this->em->createQueryBuilder();
        $query
            ->select('count(c.id_contact)')
            ->from('Entities\Contact', 'c');

        return $query->getQuery()->getSingleScalarResult();
    }

    public function getContacts($sort_col, $sort_dir, $start = 0, $limit = 10)
    {
        $query = $this->em->createQueryBuilder();

        $sort = 'c.' . $sort_col;
        $query
            ->select('c')
            ->from('Entities\Contact', 'c')
            ->setFirstResult($start)
            ->setMaxResults($limit)
            ->orderBy($sort, $sort_dir);

        return $query->getQuery()->getResult();
    }

    public function findContactById($id)
    {
        return $this->em->getRepository('Entities\Contact')->find($id);
    }

    public function createEntity($data, $id = null)
    {
        $contact = !$id ? new Contact() : $this->em->getRepository('Entities\Contact')->find($id);

        $contact_type = $this->em->getRepository('Entities\ContactType')->find($data['contact_type']);

        $contact->setName($data['contact_name']);
        $contact->setContactType($contact_type);
        $contact->setPhoneNumber($data['contact_phone']);
        $contact->setBirthDate(DateTime::createFromFormat("d/m/Y", $data['contact_birthday']));
        $contact->setCreatedAt(DateTime::createFromFormat("d/m/Y", date("d/m/Y")));
        $contact->setUpdatedAt(DateTime::createFromFormat("d/m/Y", date("d/m/Y")));

        return $contact;
    }

    public function addContact($data)
    {
        $contact = $this->createEntity($data);

        $this->em->persist($contact);
        $this->em->flush();
//        echo '<pre>';print_r($contact);die;

        return $contact;
    }

    public function updateContact($data, $id)
    {
        $contact = $this->createEntity($data, $id);
        $this->em->persist($contact);
        $this->em->flush();

        return $contact;
    }


    public function deleteContact($id)
    {
        $contact = $this->em->getRepository('Entities\Contact')->find($id);
        $this->em->remove($contact);
        $this->em->flush();
    }
}
