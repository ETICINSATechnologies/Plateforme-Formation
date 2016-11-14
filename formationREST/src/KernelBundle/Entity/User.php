<?php

namespace KernelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="kernel_user")
 * @ORM\Entity(repositoryClass="KernelBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="UsersBundle\Entity\User")
     */
    private $user_data;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="UserPosition", mappedBy="user")
     */
    private $positions;

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
     * @return mixed
     */
    public function getUserData()
    {
        return $this->user_data;
    }

    /**
     * @param mixed $user_data
     * @return User
     */
    public function setUserData($user_data)
    {
        $this->user_data = $user_data;

        return $this;
    }

    /**
     * @return array
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param array $positions
     * @return User
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        $roles = [];
        foreach ($this->positions as $position) {
            if ($position->getActive()) {
                $roles = array_merge($roles, $position->getPosition()->getRoles());
            }
        }
        return $roles;
    }

}
