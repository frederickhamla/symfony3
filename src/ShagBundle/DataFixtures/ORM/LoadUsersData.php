<?php

// src/AppBundle/DataFixtures/ORM/LoadUserData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShagBundle\Entity\Users;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new Users();
        $userAdmin->setUsername('frederick');
        $userAdmin->setPassword('amandine020884');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}
