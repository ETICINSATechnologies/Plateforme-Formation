<?php

namespace KernelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KernelBundle\Entity\User;

class UserFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setUsername('test')
            ->setEnabled(true)
            ->setPlainPassword('test')
            ->setEmail('test@test.test');

        $manager->persist($user);
        $manager->flush();

        $this->addReference('test_user', $user);
    }

    public function getOrder()
    {
        return 3;
    }
}
