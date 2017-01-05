<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="frontend")
     */
    public function indexAction(Request $request)
    {
        return $this->render('::front.html.twig');
    }
    /**
     * @Route("/back", name="backend")
     */
    public function backAction(Request $request)
    {
        return $this->render('::back.html.twig');
    }
}
