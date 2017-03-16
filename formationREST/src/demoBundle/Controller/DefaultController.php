<?php

namespace demoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('demoBundle:Default:index.html.twig');
    }
}
