<?php

namespace Supra\Bundle\MileageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 */
class Location
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $address;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $trips;

    /**
     * @var \Supra\Bundle\MileageBundle\Entity\Client
     */
    private $client;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->trips = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Location
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Location
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add trips
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Trip $trips
     *
     * @return Location
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
     * Set client
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Client $client
     *
     * @return Location
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
     * @var \Supra\Bundle\MileageBundle\Entity\Trip
     */
    private $trip;


    /**
     * Set trip
     *
     * @param \Supra\Bundle\MileageBundle\Entity\Trip $trip
     *
     * @return Location
     */
    public function setTrip(\Supra\Bundle\MileageBundle\Entity\Trip $trip = null)
    {
        $this->trip = $trip;

        return $this;
    }

    /**
     * Get trip
     *
     * @return \Supra\Bundle\MileageBundle\Entity\Trip 
     */
    public function getTrip()
    {
        return $this->trip;
    }
    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $suiteAptNo;


    /**
     * Set street
     *
     * @param string $street
     *
     * @return Location
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Location
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Location
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return Location
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set suiteAptNo
     *
     * @param string $suiteAptNo
     *
     * @return Location
     */
    public function setSuiteAptNo($suiteAptNo)
    {
        $this->suiteAptNo = $suiteAptNo;

        return $this;
    }

    /**
     * Get suiteAptNo
     *
     * @return string 
     */
    public function getSuiteAptNo()
    {
        return $this->suiteAptNo;
    }

    public function __toString()
    {

        return $this->getStreet() . ' ' . $this->getSuiteAptNo() . ' ' . $this->getCity() . ', '
               . $this->getState() . ' ' . $this->getZip();
    }
}
