<?php
	
	namespace Entities;
	
	/**
	 * Destination
	 */
	class Destination
	{
		/**
		 * @var int
		 */
		private $id_destination;
		
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var int|null
		 */
		private $rating;
		
		/**
		 * @var bool
		 */
		private $favorite;
		
		/**
		 * @var string|null
		 */
		private $description;
		
		/**
		 * @var string|null
		 */
		private $image_url;
		
		/**
		 * @var \DateTime
		 */
		private $created_at;
		
		/**
		 * @var \DateTime
		 */
		private $updated_at;
		
		
		/**
		 * Get idDestination.
		 *
		 * @return int
		 */
		public function getIdDestination() {
			return $this->id_destination;
		}
		
		/**
		 * Set name.
		 *
		 * @param string $name
		 *
		 * @return Destination
		 */
		public function setName($name) {
			$this->name = $name;
			
			return $this;
		}
		
		/**
		 * Get name.
		 *
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * Set rating.
		 *
		 * @param int|null $rating
		 *
		 * @return Destination
		 */
		public function setRating($rating = null) {
			$this->rating = $rating;
			
			return $this;
		}
		
		/**
		 * Get rating.
		 *
		 * @return int|null
		 */
		public function getRating() {
			return $this->rating;
		}
		
		/**
		 * Set favorite.
		 *
		 * @param bool $favorite
		 *
		 * @return Destination
		 */
		public function setFavorite($favorite) {
			$this->favorite = $favorite;
			
			return $this;
		}
		
		/**
		 * Get favorite.
		 *
		 * @return bool
		 */
		public function getFavorite() {
			return $this->favorite;
		}
		
		/**
		 * Set description.
		 *
		 * @param string|null $description
		 *
		 * @return Destination
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
		 * Set imageUrl.
		 *
		 * @param string|null $imageUrl
		 *
		 * @return Destination
		 */
		public function setImageUrl($imageUrl = null) {
			$this->image_url = $imageUrl;
			
			return $this;
		}
		
		/**
		 * Get imageUrl.
		 *
		 * @return string|null
		 */
		public function getImageUrl() {
			return $this->image_url;
		}
		
		/**
		 * Set createdAt.
		 *
		 * @param \DateTime $createdAt
		 *
		 * @return Destination
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
		 * @return Destination
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
		 * Constructor
		 */
		public function __construct() {
		}
	}
