<?php

namespace ShagBundle\Controller\PortFolio;

use ShagBundle\Entity\PortFolio\Contact;
use ShagBundle\Form\PortFolio\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller

{
    /**
     * @Route("/", name="home")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ('POST' === $request->getMethod()) {

            if ($form->isSubmitted() &&$form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($form->getData());
                $em->flush();

                //TODO add translations
                $this->addFlash('success', 'Merci, votre mail à bien été envoyé !');

                $this->get('app.mailer')
                    ->sendMessage(
                        $form->get('email'),
                        $form->get('subject'),
                        $form->get('content')
                    )
                ;

                return $this->redirectToRoute('home');
            }

        }

        return $this->render('ShagBundle:PortFolio:index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
