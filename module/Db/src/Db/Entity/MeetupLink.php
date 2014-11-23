<?php

namespace Db\Entity;

/**
 * MeetupLink
 */
class MeetupLink
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Db\Entity\Event
     */
    private $event;

    /**
     * Set name
     *
     * @param  string     $name
     * @return MeetupLink
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
     * Set description
     *
     * @param  string     $description
     * @return MeetupLink
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
     * Set url
     *
     * @param  string     $url
     * @return MeetupLink
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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
     * Set event
     *
     * @param  \Db\Entity\Event $event
     * @return MeetupLink
     */
    public function setEvent(\Db\Entity\Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Db\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }
}
