<?php

namespace ShagBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactTypeTest extends WebTestCase
{
    public function testSubmitForm()
    {
        $user = static::createClient();
        $crawler = $user->request('GET', '/');

        $this->assertEquals(1, $crawler->filter('h1:contains("Frédérick KHAMLA")')->count());

        $form = $crawler->selectButton('Envoyer')->form();

        $form['form_contact[firstname]'] = 'Frédérick';
        $form['form_contact[lastname]'] = 'Khamla';
        $form['form_contact[email]'] = 'frederickkhamla@gmail.com';
        $form['form_contact[subject]'] = 'sujet';
        $form['form_contact[content]'] = 'content';

        $crawler = $user->submit($form);

        if($profile = $user->getProfile()) {

            $swiftMailerProfiler = $profile->getCollector('swiftMailer');

            // verify if only one message send
            $this->assertEquals(1, $swiftMailerProfiler->getMessageCount());

            // take only first message
            $messages = $swiftMailerProfiler->getMessages();
            $message = array_shift($messages);

            $email = $user->getContainer()->getParameter('symfony3.emails.contact_email');

            // verify if the message send to right email
            $this->assertArrayHasKey($email, $message->getTo());
        }

        // force redirect after submit form
        $crawler = $user->followRedirect();

        // If flashMessage is here, our test is ok
        $this->assertTrue($crawler->filter('.flash-success:contains("Merci, votre mail à bien été envoyé !")')->count() > 0);
    }
}
