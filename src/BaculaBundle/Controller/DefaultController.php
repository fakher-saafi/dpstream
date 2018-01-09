<?php

namespace BaculaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BaculaBundle:Default:index.html.twig');
    }
}
