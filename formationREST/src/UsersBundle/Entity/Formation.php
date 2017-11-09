<?php

namespace UsersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\FormationRepository")
 */
class Formation
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
     * @var string
     *
     * @ORM\Column(name="nameFormation", type="string", length=255, unique=true)
     */
    private $nameFormation;

    /**
     * One Formation has many Chapters
     * @ORM\OneToMany(targetEntity="Chapter", mappedBy="formation")
     */
    private $chapters;

    /**
     * @var int
     *
     * @ORM\Column(name="author", type="integer")
     */
    private $author;

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * @var int
     *
     * @ORM\Column(name="prerequisites", type="integer")
     */
    private $prerequisites;

    /**
     * @var bool
     *
     * @ORM\Column(name="finished", type="boolean")
     */
    private $finished;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameFormation
     *
     * @param string $nameFormation
     * @return Formation
     */
    public function setNameFormation($nameFormation)
    {
        $this->nameFormation = $nameFormation;

        return $this;
    }

    /**
     * Get nameFormation
     *
     * @return string 
     */
    public function getNameFormation()
    {
        return $this->nameFormation;
    }

    /**
     * Get chapters
     *
     * @return ArrayCollection
     */
    public function getChapters()
    {
        return $this->chapters;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return Formation
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Formation
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set prerequisites
     *
     * @param integer $prerequisites
     * @return Formation
     */
    public function setPrerequisites($prerequisites)
    {
        $this->prerequisites = $prerequisites;

        return $this;
    }

    /**
     * Get prerequisites
     *
     * @return integer 
     */
    public function getPrerequisites()
    {
        return $this->prerequisites;
    }

    /**
     * Set finished
     *
     * @param boolean $finished
     * @return Formation
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished
     *
     * @return boolean 
     */
    public function getFinished()
    {
        return $this->finished;
    }
}
