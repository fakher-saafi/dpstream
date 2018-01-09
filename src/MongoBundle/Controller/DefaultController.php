<?php

namespace MongoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MongoBundle:Default:index.html.twig');
    }
}
