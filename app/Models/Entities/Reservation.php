<?php
	
	namespace Entities;
	
	/**
	 * Reservation
	 */
	class Reservation
	{
		/**
		 * @var int
		 */
		private $id_reservation;
		
		/**
		 * @var string|null
		 */
		private $description;
		
		/**
		 * @var \DateTime|null
		 */
		private $date;
		
		/**
		 * @var \DateTime|null
		 */
		private $time;
		
		/**
		 * @var \DateTime
		 */
		private $created_at;
		
		/**
		 * @var \DateTime
		 */
		private $updated_at;
		
		/**
		 * @var \Entities\Contact
		 */
		private $contact;
		
		/**
		 * @var \Entities\Destination
		 * @ORM\ManyToOne(targetEntity="\Entities\Destination")
		 */
		
		private $destination;
		
		
		/**
		 * Get idReservation.
		 *
		 * @return int
		 */
		public function getIdReservation() {
			return $this->id_reservation;
		}
		
		/**
		 * Set description.
		 *
		 * @param string|null $description
		 *
		 * @return Reservation
		 */
		public function setDescription($description = null) {
			$this->description = $description;
			
			return $this;
		}
		
		/**
		 * Get description.
		 *
		 * @return string|null
		 */
		public function getDescription() {
			return $this->description;
		}
		
		/**
		 * Set date.
		 *
		 * @param \DateTime|null $date
		 *
		 * @return Reservation
		 */
		public function setDate($date = null) {
			$this->date = $date;
			
			return $this;
		}
		
		/**
		 * Get date.
		 *
		 * @return \DateTime|null
		 */
		public function getDate() {
			return $this->date;
		}
		
		/**
		 * Set time.
		 *
		 * @param \DateTime|null $time
		 *
		 * @return Reservation
		 */
		public function setTime($time = null) {
			$this->time = $time;
			
			return $this;
		}
		
		/**
		 * Get time.
		 *
		 * @return \DateTime|null
		 */
		public function getTime() {
			return $this->time;
		}
		
		/**
		 * Set createdAt.
		 *
		 * @param \DateTime $createdAt
		 *
		 * @return Reservation
		 */
		public function setCreatedAt($createdAt) {
			$this->created_at = $createdAt;
			
			return $this;
		}
		
		/**
		 * Get createdAt.
		 *
		 * @return \DateTime
		 */
		public function getCreatedAt() {
			return $this->created_at;
		}
		
		/**
		 * Set updatedAt.
		 *
		 * @param \DateTime $updatedAt
		 *
		 * @return Reservation
		 */
		public function setUpdatedAt($updatedAt) {
			$this->updated_at = $updatedAt;
			
			return $this;
		}
		
		/**
		 * Get updatedAt.
		 *
		 * @return \DateTime
		 */
		public function getUpdatedAt() {
			return $this->updated_at;
		}
		
		/**
		 * Set contact.
		 *
		 * @param \Entities\Contact|null $contact
		 *
		 * @return Reservation
		 */
		public function setContact(\Entities\Contact $contact = null) {
			$this->contact = $contact;
			
			return $this;
		}
		
		/**
		 * Get contact.
		 *
		 * @return \Entities\Contact|null
		 */
		public function getContact() {
			return $this->contact;
		}
		
		/**
		 * Set destination.
		 *
		 * @param \Entities\Destination|null $destination
		 *
		 * @return Reservation
		 */
		public function setDestination(\Entities\Destination $destination = null) {
			$this->destination = $destination;
			
			return $this;
		}
		
		/**
		 * Get destination.
		 *
		 * @return \Entities\Destination|null
		 */
		public function getDestination() {
			return $this->destination;
		}
	    /**
     * @var bool
     */
    private $favorite;


    /**
     * Set favorite.
     *
     * @param bool $favorite
     *
     * @return Reservation
     */
    public function setFavorite($favorite)
    {
        $this->favorite = $favorite;

        return $this;
    }

    /**
     * Get favorite.
     *
     * @return bool
     */
    public function getFavorite()
    {
        return $this->favorite;
    }
}
