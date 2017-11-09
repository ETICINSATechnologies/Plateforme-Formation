<?php

namespace KernelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Position
 *
 * @ORM\Table(name="kernel_position")
 * @ORM\Entity(repositoryClass="KernelBundle\Repository\PositionRepository")
 */
class Position
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
     * @ORM\Column(name="label", type="string", length=255, unique=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255, nullable=true)
     */
    private $detail;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;

    /**
     * @var Division
     *
     * @ORM\ManyToOne(targetEntity="Division")
     */
    private $division;

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
     * Set label
     *
     * @param string $label
     * @return Position
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Position
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return Position
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Division
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * @param Division $division
     * @return Position
     */
    public function setDivision($division)
    {
        $this->division = $division;

        return $this;
    }

}
