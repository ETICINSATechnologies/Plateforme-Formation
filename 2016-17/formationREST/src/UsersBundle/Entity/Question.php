<?php

namespace UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Questions
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\QuestionsRepository")
 */
class Question
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Set content
     *
     * @param string $content
     * @return Question
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * @ORM\ManyToOne(targetEntity="Qcm")
     * @ORM\JoinColumn(nullable=false)
     */
    private $qcm;

    /**
     * Get content
     *
     * @return Qcm
     */
    public function getQcm()
    {
        return $this->qcm;
    }

    /**
     * @param Qcm $qcm
     * @return Question
     */
    public function setQcm($qcm)
    {
        $this->qcm = $qcm;

        return $this;
    }


    /**
     * @var ArrayCollection $proposals
     *
     * @ORM\OneToMany(targetEntity="Proposal", mappedBy="questions")
     */
    private $proposals;

    /**
     * @return ArrayCollection $proposals
     */
    public function getProposals()
    {
        return $this->proposals;
    }

    public function __construct() {
        $this->proposals = new ArrayCollection();
    }


}
