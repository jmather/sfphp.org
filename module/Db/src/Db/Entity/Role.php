<?php

namespace Db\Entity;

use BjyAuthorize\Acl\HierarchicalRoleInterface;

/**
 * Role
 */
class Role implements HierarchicalRoleInterface
{
    public function __toString()
    {
        return $this->getRoleId();
    }

    /**
     * @var string
     */
    private $roleId;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Db\Entity\Role
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $member;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->member = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set roleId
     *
     * @param  string $roleId
     * @return Role
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * Get roleId
     *
     * @return string
     */
    public function getRoleId()
    {
        return $this->roleId;
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
     * Set parent
     *
     * @param  \Db\Entity\Role $parent
     * @return Role
     */
    public function setParent(\Db\Entity\Role $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Db\Entity\Role
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add member
     *
     * @param  \Db\Entity\Member $member
     * @return Role
     */
    public function addMember(\Db\Entity\Member $member)
    {
        $this->member[] = $member;

        return $this;
    }

    /**
     * Remove member
     *
     * @param \Db\Entity\Member $member
     */
    public function removeMember(\Db\Entity\Member $member)
    {
        $this->member->removeElement($member);
    }

    /**
     * Get member
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMember()
    {
        return $this->member;
    }
}
