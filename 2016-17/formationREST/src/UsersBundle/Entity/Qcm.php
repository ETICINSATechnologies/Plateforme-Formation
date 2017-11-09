<?php

namespace UsersBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Qcm
 *
 * @ORM\Table(name="qcm")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\QcmRepository")
 */
class Qcm
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return Qcm
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @var ArrayCollection $questions
     *
     * @ORM\OneToMany(targetEntity="Question", mappedBy="qcm")
     */
    private $questions;

    /**
     * @return ArrayCollection $questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function __construct() {
        $this->questions = new ArrayCollection();
    }


    /**
     * @param Question $question
     */
    public function addQuestion(Question $question) {
        $question->setQcm($this);

        // Si l'objet fait déjà partie de la collection on ne l'ajoute pas
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
        }
    }
}
