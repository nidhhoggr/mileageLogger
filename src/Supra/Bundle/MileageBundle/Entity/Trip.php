<?php

namespace Supra\Bundle\MileageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trip
 */
class Trip
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $travelTime;

    /**
     * @var integer
     */
    private $mileage;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $tripDate;

    /**
     * @var \Supra\Bundle\MileageBundle\Entity\Client
     */
    private $client;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $locations;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set travelTime
     *
     * @param string $travelTime
     *
     * @return Trip
     */
    public function setTravelTime($travelTime)
    {
        $this->travelTime = $travelTime;

        return $this;
    }

    /**
     * Get travelTime
     *
     * @return string 
     */
    public function getTravelTime()
    {
        return $this->travelTime;
    }

    /**
     * Set mileage
     *
     * @param integer $mileage
     *
     * @return Trip
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return integer 
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Trip
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set tripDate
     *
     * @param \DateTime $tripDate
     *
     * @return Trip
     */
    public function setTripDate($tripDate)
    {
        $this->tripDate = $tripDate;

        return $this;
    }

    /**
     * Get tripDate
     *
     * @return \DateTime 
     */
    public function getTripDate()
    {
        return $this->tripDate;
    }

    /**
     * Set client
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Client $client
     *
     * @return Trip
     */
    public function setClient(\Supra\Bundle\MileageBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Supra\Bundle\MileageBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add locations
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Location $locations
     *
     * @return Trip
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

    public function prePersist()
    {

        $this->createdAt = new \DateTime();

        if($this->tripDate === null)
            $this->tripDate = new \DateTime();
    }
    /**
     * @var string
     */
    private $purpose;


    /**
     * Set purpose
     *
     * @param string $purpose
     *
     * @return Trip
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get purpose
     *
     * @return string 
     */
    public function getPurpose()
    {
        return $this->purpose;
    }
    /**
     * @var string
     */
    private $unlisted_address;


    /**
     * Set unlisted_address
     *
     * @param string $unlistedAddress
     *
     * @return Trip
     */
    public function setUnlistedAddress($unlistedAddress)
    {
        $this->unlisted_address = $unlistedAddress;

        return $this;
    }

    /**
     * Get unlisted_address
     *
     * @return string 
     */
    public function getUnlistedAddress()
    {
        return $this->unlisted_address;
    }
}
