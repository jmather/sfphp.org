<?php

namespace Station\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MemberController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
