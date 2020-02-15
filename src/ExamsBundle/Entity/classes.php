<?php

namespace ExamsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * classes
 *
 * @ORM\Table(name="classes")
 * @ORM\Entity(repositoryClass="ExamsBundle\Repository\classesRepository")
 */
class classes
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="numberofpupils", type="integer")
     */
    private $numberofpupils;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return classes
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
     * Set numberofpupils
     *
     * @param integer $numberofpupils
     *
     * @return classes
     */
    public function setNumberofpupils($numberofpupils)
    {
        $this->numberofpupils = $numberofpupils;

        return $this;
    }

    /**
     * Get numberofpupils
     *
     * @return int
     */
    public function getNumberofpupils()
    {
        return $this->numberofpupils;
    }
}

