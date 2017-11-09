<?php

namespace UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QcmState
 *
 * @ORM\Table(name="chapter_state")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\QcmStateRepository")
 */
class QcmState
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
     * @ORM\ManyToOne(targetEntity="UserTest")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userTest;

    /**
     * Set userTest
     *
     */
    public function setUserTest(UserTest $userTest)
    {
        $this->userTest = $userTest;

        return $this;
    }

    /**
     * Get userTest
     *
     */
    public function getUserTest()
    {
        return $this->userTest;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Chapter", type="string", length=255)
     */
    private $chapter;

    /**
     * @var int
     *
     * @ORM\Column(name="ValidatedQ", type="integer")
     */
    private $validatedQ;


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
     * Set chapter
     *
     * @param string $chapter
     * @return QcmState
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;

        return $this;
    }

    /**
     * Get chapter
     *
     * @return string 
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * Set validatedQ
     *
     * @param integer $validatedQ
     * @return QcmState
     */
    public function setValidatedQ($validatedQ)
    {
        $this->validatedQ = $validatedQ;

        return $this;
    }

    /**
     * Get validatedQ
     *
     * @return integer 
     */
    public function getValidatedQ()
    {
        return $this->validatedQ;
    }
}
