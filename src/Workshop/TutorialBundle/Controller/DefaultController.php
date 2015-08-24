<?php

namespace Workshop\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function helloAction($name)
    {
        return $this->render('WorkshopTutorialBundle:Default:index.html.twig', array('name' => $name));
    }
}
