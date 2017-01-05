<?php

namespace ShagBundle\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogFrontController extends Controller
{
    /**
     * @Route("/blog", name="home_blog")
     */
    public function indexAction()
    {
        return $this->render('ShagBundle:Front:index.html.twig');
    }
}