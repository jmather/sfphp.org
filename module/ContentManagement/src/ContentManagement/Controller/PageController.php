<?php

namespace ContentManagement\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PageController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

