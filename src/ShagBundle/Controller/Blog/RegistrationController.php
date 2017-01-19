<?php

namespace ShagBundle\Controller\Blog;

use ShagBundle\Entity\Blog\Roles;
use ShagBundle\Entity\Blog\Users;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ShagBundle\Form\Blog\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    /**
     * @Route("/blog/register", name="registration")
     */
    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new Users();
        $role = $this->getDoctrine()->getRepository(Roles::class)->find(1);

        $form = $this->createForm(RegistrationType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());

            $user->setPassword($password);
            $user->setIsActive(1);
            $user->setCreatedAt(new \DateTime());
            $user->addRole($role);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('posts_index');
        }

        return $this->render(
            'ShagBundle:Blog:security/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
