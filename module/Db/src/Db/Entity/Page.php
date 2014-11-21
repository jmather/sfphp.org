<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArraySerializableInterface;
use DateTime;

/**
 * Page
 */
class Page implements InputFilterAwareInterface, ArraySerializableInterface
{
    public function exchangeArray(array $array)
    {
        foreach ($array as $field => $value) {
            switch ($field) {
                case 'title':
                    $this->setTitle($value);
                    break;
                case 'description':
                    $this->setDescription($value);
                    break;
                case 'isPublished':
                    $this->setIsPublished($value);
                    break;
                case 'urlIdentifier':
                    $this->setUrlIdentifier($value);
                    break;
                default:
                    break;
            }
        }

        $this->setUpdatedAt(new DateTime());

        return $this;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->getId(),
            'urlIdentifier' => $this->getUrlIdentifier(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'isPublished' => $this->getIsPublished(),
            'updatedAt' => $this->getUpdatedAt(),
        ];
    }

// Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        $inputFilter = new InputFilter();
        $factory     = new InputFactory();

        $inputFilter->add($factory->createInput(array(
            'name' => 'urlIdentifier',
            'required' => true,
            'filters' => array(
                array('name' => 'Alnum'),
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'title',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 255,
                    ),
                ),
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name'     => 'description',
            'required' => false,
            'filters'  => array(
            ),
            'validators' => array(
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name' => 'isPublished',
            'required' => false,
            'filters' => array(
                array('name' => 'Boolean'),
            ),
        )));


        return $inputFilter;
    }

    /**
     * @var string
     */
    private $urlIdentifier;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $isPublished;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set urlIdentifier
     *
     * @param string $urlIdentifier
     * @return Page
     */
    public function setUrlIdentifier($urlIdentifier)
    {
        $this->urlIdentifier = $urlIdentifier;

        return $this;
    }

    /**
     * Get urlIdentifier
     *
     * @return string
     */
    public function getUrlIdentifier()
    {
        return $this->urlIdentifier;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Page
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
     * @param string $description
     * @return Page
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
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Page
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get isPublished
     *
     * @return boolean
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Page
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
}
