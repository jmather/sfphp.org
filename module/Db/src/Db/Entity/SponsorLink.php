<?php

namespace Db\Entity;

/**
 * SponsorLink
 */
class SponsorLink
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
     * @var \Db\Entity\Sponsor
     */
    private $sponsor;

    /**
     * Set name
     *
     * @param  string      $name
     * @return SponsorLink
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
     * @param  string      $description
     * @return SponsorLink
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
     * @param  string      $url
     * @return SponsorLink
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
     * Set sponsor
     *
     * @param  \Db\Entity\Sponsor $sponsor
     * @return SponsorLink
     */
    public function setSponsor(\Db\Entity\Sponsor $sponsor)
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    /**
     * Get sponsor
     *
     * @return \Db\Entity\Sponsor
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }
}
