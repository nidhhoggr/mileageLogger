<?php

namespace Supra\Bundle\MileageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 */
class Client
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $trips;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $locations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->trips = new \Doctrine\Common\Collections\ArrayCollection();
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add trips
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Trip $trips
     *
     * @return Client
     */
    public function addTrip(\Supra\Bundle\MileageBundle\Entity\Trip $trips)
    {
        $this->trips[] = $trips;

        return $this;
    }

    /**
     * Remove trips
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Trip $trips
     */
    public function removeTrip(\Supra\Bundle\MileageBundle\Entity\Trip $trips)
    {
        $this->trips->removeElement($trips);
    }

    /**
     * Get trips
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrips()
    {
        return $this->trips;
    }

    /**
     * Add locations
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Location $locations
     *
     * @return Client
     */
    public function addLocation(\Supra\Bundle\MileageBundle\Entity\Location $locations)
    {
        $this->locations[] = $locations;

        return $this;
    }

    /**
     * Remove locations
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Location $locations
     */
    public function removeLocation(\Supra\Bundle\MileageBundle\Entity\Location $locations)
    {
        $this->locations->removeElement($locations);
    }

    /**
     * Get locations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocations()
    {
        return $this->locations;
    }

    public function __toString() 
    {
        return $this->name;
    }
}
