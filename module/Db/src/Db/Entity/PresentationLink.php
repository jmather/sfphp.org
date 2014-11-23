<?php

namespace Db\Entity;

/**
 * PresentationLink
 */
class PresentationLink
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
     * @var \Db\Entity\Presentation
     */
    private $presentation;

    /**
     * Set name
     *
     * @param  string           $name
     * @return PresentationLink
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
     * @param  string           $description
     * @return PresentationLink
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
     * @param  string           $url
     * @return PresentationLink
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
     * Set presentation
     *
     * @param  \Db\Entity\Presentation $presentation
     * @return PresentationLink
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
}
