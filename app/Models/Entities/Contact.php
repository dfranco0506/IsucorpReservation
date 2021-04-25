<?php

namespace Entities;

/**
 * Contact
 */
class Contact
{
    /**
     * @var int
     */
    private $id_contact;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $phone_number;

    /**
     * @var \DateTime|null
     */
    private $birth_date;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="\Entities\Reservation", mappedBy="contact", cascade={"persist","refresh", "remove"})
     * @ORM\OrderBy({"fechadesde" = "ASC"})
     */
    private $reservation;


    /**
     * Get idContact.
     *
     * @return int
     */
    public function getIdContact()
    {
        return $this->id_contact;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phoneNumber.
     *
     * @param string|null $phoneNumber
     *
     * @return Contact
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber.
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set birthDate.
     *
     * @param \DateTime|null $birthDate
     *
     * @return Contact
     */
    public function setBirthDate($birthDate = null)
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    /**
     * Get birthDate.
     *
     * @return \DateTime|null
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Contact
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Contact
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @var \Entities\ContactType
     */
    private $contact_type;


    /**
     * Set contactType.
     *
     * @param \Entities\ContactType|null $contactType
     *
     * @return Contact
     */
    public function setContactType(\Entities\ContactType $contactType = null)
    {
        $this->contact_type = $contactType;

        return $this;
    }

    /**
     * Get contactType.
     *
     * @return \Entities\ContactType|null
     */
    public function getContactType()
    {
        return $this->contact_type;
    }

    /**
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param mixed $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }
}
