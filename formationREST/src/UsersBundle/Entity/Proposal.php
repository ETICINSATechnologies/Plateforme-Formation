<?php

namespace UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proposal
 *
 * @ORM\Table(name="proposal")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\ProposalRepository")
 */
class Proposal
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
     * @ORM\Column(name="contentProposal", type="string", length=255)
     */
    private $contentProposal;

    /**
     * @var bool
     *
     * @ORM\Column(name="answer", type="boolean")
     */
    private $answer;


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
     * Set contentProposal
     *
     * @param string $contentProposal
     * @return Proposal
     */
    public function setContentProposal($contentProposal)
    {
        $this->contentProposal = $contentProposal;

        return $this;
    }

    /**
     * Get contentProposal
     *
     * @return string 
     */
    public function getContentProposal()
    {
        return $this->contentProposal;
    }

    /**
     * Set answer
     *
     * @param boolean $answer
     * @return Proposal
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return boolean 
     */
    public function getAnswer()
    {
        return $this->answer;
    }



    /**
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumn(nullable=false)
     */
    private $questions;

    /**
     * Get content
     *
     * @return Question
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param Question $questions
     * @return Proposal
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }
}
