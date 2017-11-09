<?php

namespace KernelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KernelBundle\Entity\UserPosition;

class UserPositionFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $uPosition = new UserPosition();
        $uPosition
            ->setActive(true)
            ->setPosition($this->getReference('resp_dsi'))
            ->setUser($this->getReference('test_user'))
            ->setStartDate(new \DateTime());

        $manager->persist($uPosition);
        $manager->flush();

        $this->addReference('test_uPosition', $uPosition);
    }

    public function getOrder()
    {
        return 4;
    }
}
