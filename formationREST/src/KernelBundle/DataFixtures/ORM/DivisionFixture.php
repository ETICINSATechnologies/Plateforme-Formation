<?php

namespace KernelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KernelBundle\Entity\Division;

class DivisionFixture extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $division = new Division();
        $division
            ->setLabel('DSI')
            ->setDetail('Direction des Systèmes d\'Information');

        $manager->persist($division);
        $manager->flush();

        $this->addReference('division', $division);
    }

    public function getOrder()
    {
        return 1;
    }
}
