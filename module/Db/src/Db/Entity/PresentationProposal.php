<?php

namespace Db\Entity;

/**
 * PresentationProposal
 */
class PresentationProposal
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $approvedAt;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $consideration;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Db\Entity\Presentation
     */
    private $presentation;

    /**
     * @var \Db\Entity\Event
     */
    private $event;

    /**
     * @var \Db\Entity\MeetupGroup
     */
    private $meetupGroup;

    /**
     * Set createdAt
     *
     * @param  \DateTime            $createdAt
     * @return PresentationProposal
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
     * Set approvedAt
     *
     * @param  \DateTime            $approvedAt
     * @return PresentationProposal
     */
    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * Get approvedAt
     *
     * @return \DateTime
     */
    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    /**
     * Set description
     *
     * @param  string               $description
     * @return PresentationProposal
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
     * Set consideration
     *
     * @param  string               $consideration
     * @return PresentationProposal
     */
    public function setConsideration($consideration)
    {
        $this->consideration = $consideration;

        return $this;
    }

    /**
     * Get consideration
     *
     * @return string
     */
    public function getConsideration()
    {
        return $this->consideration;
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
     * Set presentation
     *
     * @param  \Db\Entity\Presentation $presentation
     * @return PresentationProposal
     */
    public function setPresentation(\Db\Entity\Presentation $presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return \Db\Entity\Presentation
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set event
     *
     * @param  \Db\Entity\Event     $event
     * @return PresentationProposal
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

    /**
     * Set meetupGroup
     *
     * @param  \Db\Entity\MeetupGroup $meetupGroup
     * @return PresentationProposal
     */
    public function setMeetupGroup(\Db\Entity\MeetupGroup $meetupGroup)
    {
        $this->meetupGroup = $meetupGroup;

        return $this;
    }

    /**
     * Get meetupGroup
     *
     * @return \Db\Entity\MeetupGroup
     */
    public function getMeetupGroup()
    {
        return $this->meetupGroup;
    }
}
