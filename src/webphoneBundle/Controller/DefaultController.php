<?php

namespace webphoneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('webphoneBundle:Default:webphone_launch.html.twig');
    }
    public function webphoneAction()
    {
        return $this->render('webphoneBundle:Default:webphone.html.twig');
    }
}
