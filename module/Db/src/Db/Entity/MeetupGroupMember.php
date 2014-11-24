<?php

namespace Db\Entity;

/**
 * MeetupGroupMember
 */
class MeetupGroupMember
{
    /**
     * @var string
     */
    private $role;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Db\Entity\MeetupGroup
     */
    private $meetupGroup;

    /**
     * @var \Db\Entity\Member
     */
    private $member;

    /**
     * Set role
     *
     * @param  string            $role
     * @return MeetupGroupMember
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
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
     * Set meetupGroup
     *
     * @param  \Db\Entity\MeetupGroup $meetupGroup
     * @return MeetupGroupMember
     */
    public function setMeetupGroup(\Db\Entity\MeetupGroup $meetupGroup = null)
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

    /**
     * Set member
     *
     * @param  \Db\Entity\Member $member
     * @return MeetupGroupMember
     */
    public function setMember(\Db\Entity\Member $member = null)
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
}
