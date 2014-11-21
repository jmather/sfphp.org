<?php
namespace ContentManagement\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Page extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('page');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'urlIdentifier',
            'attributes' => array(
                'type'  => 'text',
                'size' => '20',
            ),
            'options' => array(
                'label' => 'URL Identifier',
            ),
        ));

        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
                'size' => '80',
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));

        $this->add(array(
            'name' => 'description',
            'attributes' => array(
                'type'  => 'textarea',
                'rows' => 10,
                'cols' => 80,
            ),
            'options' => array(
                'label' => 'Page Content',
            ),
        ));

        $this->add(array(
            'name' => 'sort',
            'attributes' => array(
                'type'  => 'text',
                'size' => '4',
            ),
            'options' => array(
                'label' => 'Sort Order',
            ),
        ));

        $checkbox = new Element\Checkbox('isPublished');
        $checkbox->setLabel('Is this page published?');
        $checkbox->setUseHiddenElement(true);
        $checkbox->setCheckedValue("1");
        $checkbox->setUncheckedValue("0");

        $this->add($checkbox);

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save',
                'id' => 'submitbutton',
            ),
        ));
    }
}
