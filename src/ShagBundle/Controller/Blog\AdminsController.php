<?php

namespace ShagBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class Blog\AdminsController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        return $this->render('ShagBundle:Blog\Admins:admin.html.twig', array(
            // ...
        ));
    }

}
