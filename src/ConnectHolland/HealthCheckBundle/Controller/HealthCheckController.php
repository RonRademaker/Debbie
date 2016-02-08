<?php

namespace ConnectHolland\HealthCheckBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ConnectHollandHealthCheckBundle:Default:index.html.twig');
    }
}
