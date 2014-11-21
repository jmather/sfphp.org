<?php

namespace Db\Entity;


/**
 * EventQuestion
 */
class EventQuestion
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
     * @var \Db\Entity\Event
     */
    private $event;

    /**
     * Set body
     *
     * @param  string        $body
     * @return EventQuestion
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
     * Set event
     *
     * @param  \Db\Entity\Event $event
     * @return EventQuestion
     */
    public function setEvent(\Db\Entity\Event $event = null)
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
