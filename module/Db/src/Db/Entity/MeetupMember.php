<?php

namespace Db\Entity;


/**
 * MeetupMember
 */
class MeetupMember
{
    /**
     * @var \DateTime
     */
    private $rsvpAt;

    /**
     * @var \DateTime
     */
    private $attendedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Db\Entity\Member
     */
    private $member;

    /**
     * @var \Db\Entity\Event
     */
    private $event;

    /**
     * Set rsvpAt
     *
     * @param  \DateTime    $rsvpAt
     * @return MeetupMember
     */
    public function setRsvpAt($rsvpAt)
    {
        $this->rsvpAt = $rsvpAt;

        return $this;
    }

    /**
     * Get rsvpAt
     *
     * @return \DateTime
     */
    public function getRsvpAt()
    {
        return $this->rsvpAt;
    }

    /**
     * Set attendedAt
     *
     * @param  \DateTime    $attendedAt
     * @return MeetupMember
     */
    public function setAttendedAt($attendedAt)
    {
        $this->attendedAt = $attendedAt;

        return $this;
    }

    /**
     * Get attendedAt
     *
     * @return \DateTime
     */
    public function getAttendedAt()
    {
        return $this->attendedAt;
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
     * Set member
     *
     * @param  \Db\Entity\Member $member
     * @return MeetupMember
     */
    public function setMember(\Db\Entity\Member $member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \Db\Entity\Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set event
     *
     * @param  \Db\Entity\Event $event
     * @return MeetupMember
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
