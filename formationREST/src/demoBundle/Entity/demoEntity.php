<?php

namespace demoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * demoEntity
 *
 * @ORM\Table(name="demo_entity")
 * @ORM\Entity(repositoryClass="demoBundle\Repository\demoEntityRepository")
 */
class demoEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
