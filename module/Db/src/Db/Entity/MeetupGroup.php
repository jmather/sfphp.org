<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MeetupGroup
 */
class MeetupGroup
{
    /**
     * @var string
     */
    private $name;

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
    private $sponsor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $meetupGroupLink;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $presentationProposal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $meetupGroupMember;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jointEvent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sponsor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->meetupGroupLink = new \Doctrine\Common\Collections\ArrayCollection();
        $this->presentationProposal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->meetupGroupMember = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jointEvent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return MeetupGroup
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
     * Set id
     *
     * @param integer $id
     * @return MeetupGroup
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
     * @return MeetupGroup
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
     * Add sponsor
     *
     * @param \Db\Entity\Sponsor $sponsor
     * @return MeetupGroup
     */
    public function addSponsor(\Db\Entity\Sponsor $sponsor)
    {
        $this->sponsor[] = $sponsor;

        return $this;
    }

    /**
     * Remove sponsor
     *
     * @param \Db\Entity\Sponsor $sponsor
     */
    public function removeSponsor(\Db\Entity\Sponsor $sponsor)
    {
        $this->sponsor->removeElement($sponsor);
    }

    /**
     * Get sponsor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }

    /**
     * Add meetupGroupLink
     *
     * @param \Db\Entity\MeetupGroupLink $meetupGroupLink
     * @return MeetupGroup
     */
    public function addMeetupGroupLink(\Db\Entity\MeetupGroupLink $meetupGroupLink)
    {
        $this->meetupGroupLink[] = $meetupGroupLink;

        return $this;
    }

    /**
     * Remove meetupGroupLink
     *
     * @param \Db\Entity\MeetupGroupLink $meetupGroupLink
     */
    public function removeMeetupGroupLink(\Db\Entity\MeetupGroupLink $meetupGroupLink)
    {
        $this->meetupGroupLink->removeElement($meetupGroupLink);
    }

    /**
     * Get meetupGroupLink
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMeetupGroupLink()
    {
        return $this->meetupGroupLink;
    }

    /**
     * Add presentationProposal
     *
     * @param \Db\Entity\PresentationProposal $presentationProposal
     * @return MeetupGroup
     */
    public function addPresentationProposal(\Db\Entity\PresentationProposal $presentationProposal)
    {
        $this->presentationProposal[] = $presentationProposal;

        return $this;
    }

    /**
     * Remove presentationProposal
     *
     * @param \Db\Entity\PresentationProposal $presentationProposal
     */
    public function removePresentationProposal(\Db\Entity\PresentationProposal $presentationProposal)
    {
        $this->presentationProposal->removeElement($presentationProposal);
    }

    /**
     * Get presentationProposal
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPresentationProposal()
    {
        return $this->presentationProposal;
    }

    /**
     * Add meetupGroupMember
     *
     * @param \Db\Entity\MeetupGroupMember $meetupGroupMember
     * @return MeetupGroup
     */
    public function addMeetupGroupMember(\Db\Entity\MeetupGroupMember $meetupGroupMember)
    {
        $this->meetupGroupMember[] = $meetupGroupMember;

        return $this;
    }

    /**
     * Remove meetupGroupMember
     *
     * @param \Db\Entity\MeetupGroupMember $meetupGroupMember
     */
    public function removeMeetupGroupMember(\Db\Entity\MeetupGroupMember $meetupGroupMember)
    {
        $this->meetupGroupMember->removeElement($meetupGroupMember);
    }

    /**
     * Get meetupGroupMember
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMeetupGroupMember()
    {
        return $this->meetupGroupMember;
    }

    /**
     * Add jointEvent
     *
     * @param \Db\Entity\Event $jointEvent
     * @return MeetupGroup
     */
    public function addJointEvent(\Db\Entity\Event $jointEvent)
    {
        $this->jointEvent[] = $jointEvent;

        return $this;
    }

    /**
     * Remove jointEvent
     *
     * @param \Db\Entity\Event $jointEvent
     */
    public function removeJointEvent(\Db\Entity\Event $jointEvent)
    {
        $this->jointEvent->removeElement($jointEvent);
    }

    /**
     * Get jointEvent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJointEvent()
    {
        return $this->jointEvent;
    }
}
