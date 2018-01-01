<?php

namespace loginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('loginBundle:Default:index.html.twig');
    }
}
