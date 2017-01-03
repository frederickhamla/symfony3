<?php

namespace ShagBundle\Controller\PortFolio;

use ShagBundle\Entity\PortFolio\Users;
use ShagBundle\Form\PortFolio\UsersType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    /**
     * @Route("/", name="home")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $contact = new Users();

        $form = $this->createForm(UsersType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('ShagBundle:PortFolio:index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
