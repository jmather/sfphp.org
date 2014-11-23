<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venue
 */
class Venue
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address1;

    /**
     * @var string
     */
    private $address2;

    /**
     * @var string
     */
    private $address3;

    /**
     * @var string
     */
    private $cityStateCountry;

    /**
     * @var string
     */
    private $latLon;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var string
     */
    private $security;

    /**
     * @var string
     */
    private $equipment;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $venueQuestion;

    /**
     * @var \Db\Entity\Sponsor
     */
    private $sponsor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->venueQuestion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Venue
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
     * Set address1
     *
     * @param string $address1
     * @return Venue
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return Venue
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     * @return Venue
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get address3
     *
     * @return string 
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set cityStateCountry
     *
     * @param string $cityStateCountry
     * @return Venue
     */
    public function setCityStateCountry($cityStateCountry)
    {
        $this->cityStateCountry = $cityStateCountry;

        return $this;
    }

    /**
     * Get cityStateCountry
     *
     * @return string 
     */
    public function getCityStateCountry()
    {
        return $this->cityStateCountry;
    }

    /**
     * Set latLon
     *
     * @param string $latLon
     * @return Venue
     */
    public function setLatLon($latLon)
    {
        $this->latLon = $latLon;

        return $this;
    }

    /**
     * Get latLon
     *
     * @return string 
     */
    public function getLatLon()
    {
        return $this->latLon;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Venue
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Venue
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
     * Set capacity
     *
     * @param integer $capacity
     * @return Venue
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Venue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return Venue
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set security
     *
     * @param string $security
     * @return Venue
     */
    public function setSecurity($security)
    {
        $this->security = $security;

        return $this;
    }

    /**
     * Get security
     *
     * @return string 
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * Set equipment
     *
     * @param string $equipment
     * @return Venue
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get equipment
     *
     * @return string 
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Venue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Add event
     *
     * @param \Db\Entity\Event $event
     * @return Venue
     */
    public function addEvent(\Db\Entity\Event $event)
    {
        $this->event[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Db\Entity\Event $event
     */
    public function removeEvent(\Db\Entity\Event $event)
    {
        $this->event->removeElement($event);
    }

    /**
     * Get event
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Add venueQuestion
     *
     * @param \Db\Entity\VenueQuestion $venueQuestion
     * @return Venue
     */
    public function addVenueQuestion(\Db\Entity\VenueQuestion $venueQuestion)
    {
        $this->venueQuestion[] = $venueQuestion;

        return $this;
    }

    /**
     * Remove venueQuestion
     *
     * @param \Db\Entity\VenueQuestion $venueQuestion
     */
    public function removeVenueQuestion(\Db\Entity\VenueQuestion $venueQuestion)
    {
        $this->venueQuestion->removeElement($venueQuestion);
    }

    /**
     * Get venueQuestion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVenueQuestion()
    {
        return $this->venueQuestion;
    }

    /**
     * Set sponsor
     *
     * @param \Db\Entity\Sponsor $sponsor
     * @return Venue
     */
    public function setSponsor(\Db\Entity\Sponsor $sponsor)
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    /**
     * Get sponsor
     *
     * @return \Db\Entity\Sponsor 
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }
}
