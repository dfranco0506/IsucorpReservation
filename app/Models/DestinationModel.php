<?php namespace App\Models;

use Entities\Destination;
class DestinationModel extends BaseModel
{
	var $table = 'ddestination';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getAllDestinations() {
		return $this->em->getRepository('Entities\Destination')->findAll();
	}
    public function updateDestnationFavorites($destination)
    {
        echo '<pre>';print_r($destination);die;
        $destination= $this->em->getRepository('Entities\Destination')->find($destination->getIdDestination());
        $destination->setFavorite($destination->getFavorite()==0?1:0);
        $this->em->persist($destination);
        $this->em->flush();

        return $destination->getIdDestination();
    }
}
