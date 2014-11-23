<?php

namespace Db\Entity;

/**
 * MemberLink
 */
class MemberLink
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
     * @var \Db\Entity\Member
     */
    private $member;

    /**
     * Set name
     *
     * @param  string     $name
     * @return MemberLink
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
     * @return MemberLink
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
     * @return MemberLink
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
     * Set member
     *
     * @param  \Db\Entity\Member $member
     * @return MemberLink
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
}
