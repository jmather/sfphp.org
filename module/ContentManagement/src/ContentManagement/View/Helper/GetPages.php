<?php

namespace ContentManagement\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Helper for fetching ContentManagement Pages
 */
class GetPages extends AbstractHelper implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * Returns page(s)
     */
    public function __invoke($urlIdentifier = null, $isPublished = true)
    {
        $objectManager = $this->getServiceLocator()->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        if ($urlIdentifier) {
            return $objectManager->getRepository('Db\Entity\Page')->findOneBy([
                'urlIdentifier' => $page,
                'isPublished' => $isPublished,
            ]);
        }

        if ($isPublished) {
            return $objectManager->getRepository('Db\Entity\Page')->findBy([
                'isPublished' => true,
            ], ['sort' => 'ASC']);
        }

        return $objectManager->getRepository('Db\Entity\Page')->findAll(['sort' => 'ASC']);
    }
}
