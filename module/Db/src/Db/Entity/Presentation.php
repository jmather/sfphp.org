<?php

namespace Db\Entity;


/**
 * Presentation
 */
class Presentation
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $duration;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $presentationLink;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $presentationSubmit;

    /**
     * @var \Db\Entity\Member
     */
    private $member;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->presentationLink = new \Doctrine\Common\Collections\ArrayCollection();
        $this->presentationSubmit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title
     *
     * @param  string       $title
     * @return Presentation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param  string       $description
     * @return Presentation
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
     * Set duration
     *
     * @param  string       $duration
     * @return Presentation
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
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
     * Add presentationLink
     *
     * @param  \Db\Entity\PresentationLink $presentationLink
     * @return Presentation
     */
    public function addPresentationLink(\Db\Entity\PresentationLink $presentationLink)
    {
        $this->presentationLink[] = $presentationLink;

        return $this;
    }

    /**
     * Remove presentationLink
     *
     * @param \Db\Entity\PresentationLink $presentationLink
     */
    public function removePresentationLink(\Db\Entity\PresentationLink $presentationLink)
    {
        $this->presentationLink->removeElement($presentationLink);
    }

    /**
     * Get presentationLink
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPresentationLink()
    {
        return $this->presentationLink;
    }

    /**
     * Add presentationSubmit
     *
     * @param  \Db\Entity\PresentationProposal $presentationSubmit
     * @return Presentation
     */
    public function addPresentationSubmit(\Db\Entity\PresentationProposal $presentationSubmit)
    {
        $this->presentationSubmit[] = $presentationSubmit;

        return $this;
    }

    /**
     * Remove presentationSubmit
     *
     * @param \Db\Entity\PresentationProposal $presentationSubmit
     */
    public function removePresentationSubmit(\Db\Entity\PresentationProposal $presentationSubmit)
    {
        $this->presentationSubmit->removeElement($presentationSubmit);
    }

    /**
     * Get presentationSubmit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPresentationSubmit()
    {
        return $this->presentationSubmit;
    }

    /**
     * Set member
     *
     * @param  \Db\Entity\Member $member
     * @return Presentation
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
