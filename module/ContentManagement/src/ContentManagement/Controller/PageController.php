<?php

namespace ContentManagement\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Db\Entity\Page as PageEntity;
use ContentManagement\Form\Page as PageForm;
use ContentManagement\Form\InputFilter\Page as PageInputFilter;
use Exception;

class PageController extends AbstractActionController
{

    public function indexAction()
    {
        $urlIdentifier = $this->params()->fromRoute('url-identifier');
        $objectManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        $page = $objectManager->getRepository('Db\Entity\Page')->findOneBy([
            'urlIdentifier' => $urlIdentifier,
        ]);

        return new ViewModel(['page' => $page]);
    }

    public function createAction()
    {
        $urlIdentifier = $this->params()->fromRoute('url-identifier');
        $objectManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        // FIXME:  Verify urlIdentifier is valid

        $page = new PageEntity;
        $page->setUrlIdentifier($urlIdentifier);
        $page->setTitle($urlIdentifier);
        $page->setIsPublished(false);

        $objectManager->persist($page);
        $objectManager->flush();

        return $this->plugin('redirect')->toRoute('page/edit', ['url-identifier' => $page->getUrlIdentifier()]);
    }

    public function editAction()
    {
        $urlIdentifier = $this->params()->fromRoute('url-identifier');
        $objectManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        $page = $objectManager->getRepository('Db\Entity\Page')->findOneBy([
            'urlIdentifier' => $urlIdentifier,
        ]);

        if (!$page) {
            throw new Exception('Page not found by url identifier ' . $urlIdentifier);
        }

        $form = new PageForm;
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setInputFilter($page->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();
                $data['urlIdentifier'] = $urlIdentifier;

                $page->exchangeArray($data);
                $objectManager->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('page', ['url-identifier' => $urlIdentifier]);
            }
        } else {
            $form->setData($page->getArrayCopy());
        }

        return new ViewModel(['form' => $form]);
    }
}

