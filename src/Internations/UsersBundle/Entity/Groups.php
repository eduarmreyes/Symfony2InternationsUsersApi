<?php

namespace Internations\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Groups
 *
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="Internations\UsersBundle\Repository\GroupsRepository")
 */

class Groups
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
	 * @var name
	 *
	 * @ORM\Column(name="name", type="string")
	 */
	private $name;

	/**
	 * @var status
	 *
	 * @ORM\Column(name="status", type="integer")
	 */
	private $status;

	/**
	 * Many Groups have Many Users.
	 * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
	 */
	private $users;

	/**
	 * @var created_by
	 *
	 * @ORM\Column(name="created_by", type="integer")
	 */
	private $created_by;

	/**
	 * @var created_at
	 *
	 * @ORM\Column(name="created_at", type="datetime")
	 */
	private $created_at;

	/**
	 * @var updated_by
	 *
	 * @ORM\Column(name="updated_by", type="integer")
	 */
	private $updated_by;

	/**
	 * @var updated_at
	 *
	 * @ORM\Column(name="updated_at", type="datetime")
	 */
	private $updated_at;

	public function __construct()
	{
		$this->created_at = new \DateTime();
		$this->updated_at = new \DateTime();

		$this->users = new ArrayCollection();
	}

	/**
	 * Get id
	 *
	 * return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string name
	 * return Group
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set status
	 *
	 * @param string status
	 * return User
	 */
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get status
	 *
	 * return string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set Users
	 *
	 * @param User user
	 * return Group
	 */
	public function setUser($user)
	{
		$this->users = $user;

		return $this;
	}

	/**
	 * Get Users
	 *
	 * return Users
	 */
	public function getUsers()
	{
		return $this->users;
	}

	/**
	 * Set created_by
	 *
	 * @param integer created_by
	 * return Group
	 */
	public function setCreatedBy($created_by)
	{
		$this->created_by = $created_by;

		return $this;
	}

	/**
	 * Get created_by
	 *
	 * return integer
	 */
	public function getCreatedBy()
	{
		return $this->created_by;
	}

	/**
	 * Set created_at
	 *
	 * @param integer created_at
	 * return Group
	 */
	public function setCreatedAt()
	{
		$this->created_at = new \DateTime();

		return $this;
	}

	/**
	 * Get created_at
	 *
	 * return integer
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}

	/**
	 * Set updated_by
	 *
	 * @param integer updated_by
	 * return Group
	 */
	public function setUpdatedBy($updated_by)
	{
		$this->updated_by = $updated_by;

		return $this;
	}

	/**
	 * Get updated_by
	 *
	 * return integer
	 */
	public function getUpdatedBy()
	{
		return $this->updated_by;
	}

	/**
	 * Set updated_at
	 *
	 * @param integer updated_at
	 * return Group
	 */
	public function setUpdatedAt()
	{
		$this->updated_at = new \DateTime();

		return $this;
	}

	/**
	 * Get updated_at
	 *
	 * return integer
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

}