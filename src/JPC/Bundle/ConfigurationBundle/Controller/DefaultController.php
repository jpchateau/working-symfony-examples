<?php

namespace JPC\Bundle\ConfigurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        dump($this->getParameter('jpc_configuration'));

        return $this->render('JPCConfigurationBundle:Default:index.html.twig', []);
    }
}
