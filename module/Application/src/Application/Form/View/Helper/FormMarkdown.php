<?php

namespace Application\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\Exception;
use Zend\Form\View\Helper\AbstractHelper;

class FormMarkdown extends AbstractHelper
{
    /**
     * Attributes valid for the input tag
     *
     * @var array
     */
    protected $validTagAttributes = array(
        'autofocus'   => true,
        'cols'        => true,
        'dirname'     => true,
        'disabled'    => true,
        'form'        => true,
        'maxlength'   => true,
        'name'        => true,
        'placeholder' => true,
        'readonly'    => true,
        'required'    => true,
        'rows'        => true,
        'wrap'        => true,
    );

    /**
     * Invoke helper as functor
     *
     * Proxies to {@link render()}.
     *
     * @param  ElementInterface|null $element
     * @return string|FormTextarea
     */
    public function __invoke(ElementInterface $element = null)
    {
        if (!$element) {
            return $this;
        }

        return $this->render($element);
    }

    /**
     * Render a form <textarea> + preview element from the provided $element
     *
     * @param  ElementInterface $element
     * @throws Exception\DomainException
     * @return string
     */
    public function render(ElementInterface $element)
    {
        $name   = $element->getName();
        if (empty($name) && $name !== 0) {
            throw new Exception\DomainException(sprintf(
                '%s requires that the element has an assigned name; none discovered',
                __METHOD__
            ));
        }

        $attributes         = $element->getAttributes();
        $attributes['name'] = $name;
        $content            = (string) $element->getValue();
        $escapeHtml         = $this->getEscapeHtmlHelper();

        return sprintf(
            '<ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a data-toggle="tab" href="#%s-content"><strong>%s</strong></a>
                </li>
                <li role="presentation">
                    <a data-toggle="tab" href="#%s-preview">Preview</a>
                </li>
            </ul>
            <div id="%s-tabs" class="tab-content">
                <div class="tab-pane active" id="%s-content">
                    <textarea oninput="$(\'#%s-preview\').html(markdown.toHTML(this.value));" %s>%s</textarea>
                </div>

                <div class="tab-pane" id="%s-preview">
                </div>
            </div>
            ',
            $name,
            $element->getLabel(),
            $name,
            $name,
            $name,
            $name,
            $this->createAttributesString($attributes),
            $escapeHtml($content),
            $name
        );
    }
}
