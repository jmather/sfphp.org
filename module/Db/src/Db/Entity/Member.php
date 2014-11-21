<?php

namespace Db\Entity;


/**
 * Member
 */
class Member
{
    /**
     * @var string
     */
    private $fullname;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var string
     */
    private $password;

    /**
     * @var integer
     */
    private $state;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $presentation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $meetupUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sponsorContact;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $memberLink;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $meetupGroupMember;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eventHost;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->presentation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->meetupUser = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sponsorContact = new \Doctrine\Common\Collections\ArrayCollection();
        $this->memberLink = new \Doctrine\Common\Collections\ArrayCollection();
        $this->meetupGroupMember = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eventHost = new \Doctrine\Common\Collections\ArrayCollection();
        $this->role = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set fullname
     *
     * @param  string $fullname
     * @return Member
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set username
     *
     * @param  string $username
     * @return Member
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param  string $email
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set displayName
     *
     * @param  string $displayName
     * @return Member
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set password
     *
     * @param  string $password
     * @return Member
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set state
     *
     * @param  integer $state
     * @return Member
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
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
     * Add presentation
     *
     * @param  \Db\Entity\Presentation $presentation
     * @return Member
     */
    public function addPresentation(\Db\Entity\Presentation $presentation)
    {
        $this->presentation[] = $presentation;

        return $this;
    }

    /**
     * Remove presentation
     *
     * @param \Db\Entity\Presentation $presentation
     */
    public function removePresentation(\Db\Entity\Presentation $presentation)
    {
        $this->presentation->removeElement($presentation);
    }

    /**
     * Get presentation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Add meetupUser
     *
     * @param  \Db\Entity\MeetupMember $meetupUser
     * @return Member
     */
    public function addMeetupUser(\Db\Entity\MeetupMember $meetupUser)
    {
        $this->meetupUser[] = $meetupUser;

        return $this;
    }

    /**
     * Remove meetupUser
     *
     * @param \Db\Entity\MeetupMember $meetupUser
     */
    public function removeMeetupUser(\Db\Entity\MeetupMember $meetupUser)
    {
        $this->meetupUser->removeElement($meetupUser);
    }

    /**
     * Get meetupUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMeetupUser()
    {
        return $this->meetupUser;
    }

    /**
     * Add sponsorContact
     *
     * @param  \Db\Entity\SponsorContact $sponsorContact
     * @return Member
     */
    public function addSponsorContact(\Db\Entity\SponsorContact $sponsorContact)
    {
        $this->sponsorContact[] = $sponsorContact;

        return $this;
    }

    /**
     * Remove sponsorContact
     *
     * @param \Db\Entity\SponsorContact $sponsorContact
     */
    public function removeSponsorContact(\Db\Entity\SponsorContact $sponsorContact)
    {
        $this->sponsorContact->removeElement($sponsorContact);
    }

    /**
     * Get sponsorContact
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSponsorContact()
    {
        return $this->sponsorContact;
    }

    /**
     * Add memberLink
     *
     * @param  \Db\Entity\MemberLink $memberLink
     * @return Member
     */
    public function addMemberLink(\Db\Entity\MemberLink $memberLink)
    {
        $this->memberLink[] = $memberLink;

        return $this;
    }

    /**
     * Remove memberLink
     *
     * @param \Db\Entity\MemberLink $memberLink
     */
    public function removeMemberLink(\Db\Entity\MemberLink $memberLink)
    {
        $this->memberLink->removeElement($memberLink);
    }

    /**
     * Get memberLink
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMemberLink()
    {
        return $this->memberLink;
    }

    /**
     * Add meetupGroupMember
     *
     * @param  \Db\Entity\MeetupGroupMember $meetupGroupMember
     * @return Member
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
     * Add eventHost
     *
     * @param  \Db\Entity\Event $eventHost
     * @return Member
     */
    public function addEventHost(\Db\Entity\Event $eventHost)
    {
        $this->eventHost[] = $eventHost;

        return $this;
    }

    /**
     * Remove eventHost
     *
     * @param \Db\Entity\Event $eventHost
     */
    public function removeEventHost(\Db\Entity\Event $eventHost)
    {
        $this->eventHost->removeElement($eventHost);
    }

    /**
     * Get eventHost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventHost()
    {
        return $this->eventHost;
    }

    /**
     * Add role
     *
     * @param  \Db\Entity\Role $role
     * @return Member
     */
    public function addRole(\Db\Entity\Role $role)
    {
        $this->role[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \Db\Entity\Role $role
     */
    public function removeRole(\Db\Entity\Role $role)
    {
        $this->role->removeElement($role);
    }

    /**
     * Get role
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRole()
    {
        return $this->role;
    }
}
