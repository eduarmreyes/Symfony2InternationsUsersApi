<?php

namespace Internations\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Internations\UsersBundle\Repository\UserRepository")
 */

class User
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
	 * @ORM\Column(name="name", type="string", length=100)
	 */
	private $name;

	/**
	 * @var status
	 *
	 * @ORM\Column(name="status", type="integer")
	 */
	private $status;

	/**
	 * @var created_by
	 *
	 * @ORM\Column(name="created_by", type="integer", nullable=true)
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
	 * @ORM\Column(name="updated_by", type="integer", nullable=true)
	 */
	private $updated_by;

	/**
	 * @var updated_at
	 *
	 * @ORM\Column(name="updated_at", type="datetime")
	 */
	private $updated_at;

	/**
	 * @var type
	 *
	 * @ORM\Column(name="type", type="integer")
	 */
	private $type;

	/**
	 * Many Users have Many Groups.
	 * @ORM\ManyToMany(targetEntity="Groups", inversedBy="users")
	 * @ORM\JoinTable(name="users_groups")
	 */
	private $groups;

	public function __construct()
	{
		$this->created_at = new \DateTime();
		$this->updated_at = new \DateTime();

		$this->groups = new ArrayCollection();

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
	 * return User
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
	 * Set created_by
	 *
	 * @param integer created_by
	 * return User
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
	 * return User
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
	 * return User
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
	 * return User
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

	/**
	 * Get type
	 *
	 * return integer
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Set type
	 *
	 * @param integer type
	 * return User
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get groups
	 *
	 * @param Group groups
	 * return User
	 */
	public function getGroups()
	{
		return $this->groups;
	}

}