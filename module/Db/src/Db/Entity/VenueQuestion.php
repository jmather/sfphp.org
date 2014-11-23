<?php

namespace Db\Entity;

/**
 * VenueQuestion
 */
class VenueQuestion
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Db\Entity\Venue
     */
    private $venue;

    /**
     * Set body
     *
     * @param  string        $body
     * @return VenueQuestion
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
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
     * Set venue
     *
     * @param  \Db\Entity\Venue $venue
     * @return VenueQuestion
     */
    public function setVenue(\Db\Entity\Venue $venue = null)
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * Get venue
     *
     * @return \Db\Entity\Venue
     */
    public function getVenue()
    {
        return $this->venue;
    }
}
