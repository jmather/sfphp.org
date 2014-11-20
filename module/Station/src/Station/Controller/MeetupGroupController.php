<?php

namespace Station\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MeetupGroupController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

