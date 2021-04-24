<?php namespace App\Models;

use DateTime;
use Entities\Reservation;

class ReservationModel extends BaseModel
{
    protected $table = 'dreservation';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllReservations()
    {
        return $this->em->getRepository('Entities\Reservation')->findAll();
    }

    public function getReservationCount()
    {
        $query = $this->em->createQueryBuilder();
        $query
            ->select('count(r.id_reservation)')
            ->from('Entities\Reservation', 'r');

        return $query->getQuery()->getSingleScalarResult();
    }

    public function getReservations($sort_col, $sort_dir, $start = 0, $limit = 10)
    {
        $query = $this->em->createQueryBuilder();

        $sort = 'r.' . $sort_col;
        $query
            ->select('r')
            ->from('Entities\Reservation', 'r')
            ->setFirstResult($start)
            ->setMaxResults($limit);

        if ($sort_col == 'name' || $sort_col == 'rating') {
            $query->innerJoin('r.destination', 'd');
            $sort = 'd.' . $sort_col;
        }

        $query->orderBy($sort, $sort_dir);

        return $query->getQuery()->getResult();
    }

    public function addReservation($data)
    {
        $reservation = new Reservation();
        $destination = $this->em->getRepository('Entities\Destination')->find($data['destination']);
        $contact = $this->em->getRepository('Entities\Contact')->find($data['contact']);
        $reservation_time = new DateTime($data['reservation_time']);
        $reservation->setContact($contact);
        $reservation->setDestination($destination);
        $reservation->setDate(DateTime::createFromFormat("m/d/Y", $data['reservation_date']));
        $reservation->setTime($reservation_time);
        $reservation->setDescription($data['description']);
        $reservation->setCreatedAt(new DateTime());
        $reservation->setUpdatedAt(new DateTime());

        $this->em->persist($reservation);
        $this->em->flush();

        return $reservation->getIdReservation();
    }

    public function getReservationById($id_reservation)
    {
        $reservation = $this->em->getRepository('Entities\Reservation')->find($id_reservation);

        if ($reservation)
            return $reservation;
        else
            return null;
    }

    public function updateReservation($data, $id)
    {
        $reservation = $this->em->getRepository('Entities\Reservation')->find($id);
        $destination = $this->em->getRepository('Entities\Destination')->find($data['destination']);
        $reservation_time = new DateTime($data['reservation_time']);
        $reservation->setDestination($destination);
        $reservation->setDate(DateTime::createFromFormat("m/d/Y", $data['reservation_date']));
        $reservation->setTime($reservation_time);
        $reservation->setDescription($data['description']);
        $reservation->setCreatedAt(new DateTime());
        $reservation->setUpdatedAt(new DateTime());

        $this->em->persist($reservation);
        $this->em->flush();

        return $reservation->getIdReservation();
    }

    public function updateFavorite($id)
    {
        $reservation = $this->em->getRepository('Entities\Reservation')->find($id);
        $reservation->setFavorite($reservation->getFavorite()==true?false:true);
        $this->em->persist($reservation);
        $this->em->flush();

        return $reservation->getFavorite();
    }
}
