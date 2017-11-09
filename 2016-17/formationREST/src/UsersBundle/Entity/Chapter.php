<?php

namespace UsersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Chapter
 *
 * @ORM\Table(name="chapter")
 * @ORM\Entity(repositoryClass="UsersBundle\Repository\ChapterRepository")
 */
class Chapter
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
     * @ORM\Column(name="nameChapter", type="string", length=255)
     */
    private $nameChapter;

    /**
     * @var int
     *
     * @ORM\Column(name="pointsChapter", type="integer")
     */
    private $pointsChapter;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * One Chapter has Many Documents.
     * @ORM\OneToMany(targetEntity="Document", mappedBy="chapter")
     */
    private $documents;

    /**
     * One Chapter has Many Documents.
     * @ORM\OneToMany(targetEntity="Qcm", mappedBy="chapter")
     */
    private $qcms;


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
     * Set nameChapter
     *
     * @param string $nameChapter
     * @return Chapter
     */
    public function setNameChapter($nameChapter)
    {
        $this->nameChapter = $nameChapter;

        return $this;
    }

    /**
     * Get nameChapter
     *
     * @return string 
     */
    public function getNameChapter()
    {
        return $this->nameChapter;
    }

    /**
     * Set pointsChapter
     *
     * @param integer $pointsChapter
     * @return Chapter
     */
    public function setPointsChapter($pointsChapter)
    {
        $this->pointsChapter = $pointsChapter;

        return $this;
    }

    /**
     * Get pointsChapter
     *
     * @return integer 
     */
    public function getPointsChapter()
    {
        return $this->pointsChapter;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Chapter
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
     * Set documents
     *
     * @param string $documents
     * @return Chapter
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Get documents
     *
     * @return ArrayCollection $documents
     */
    public function getDocuments()
    {
        return $this->documents;
    }


    /**
     * Get qcms
     *
     * @return ArrayCollection
     */
    public function getQcms()
    {
        return $this->qcms;
    }
}
