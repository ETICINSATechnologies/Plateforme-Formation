<?php

namespace KernelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KernelBundle\Entity\Position;

class PositionFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $position = new Position();
        $position
            ->setLabel('Responsable DSI')
            ->setDetail('Responsable DSI')
            ->setRoles(['ROLE_SUPERADMIN'])
            ->setDivision($this->getReference('division'));

        $manager->persist($position);
        $manager->flush();

        $this->addReference('resp_dsi', $position);
    }

    public function getOrder()
    {
        return 2;
    }
}
