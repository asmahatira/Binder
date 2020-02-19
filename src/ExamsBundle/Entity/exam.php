<?php

namespace ExamsBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * exam
 *
 * @ORM\Table(name="exam")
 * @ORM\Entity(repositoryClass="ExamsBundle\Repository\examRepository")
 */
class exam
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idE;

    /**
     * @var string
     * @Assert\NotBlank

     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;


    /**
     * Get idE
     *
     * @return int
     */
    public function getIdE()
    {
        return $this->idE;
    }
    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return exam
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }
    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }
    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return exam
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="grade")
     * @ORM\JoinColumn(name="idgrade", referencedColumnName="id", onDelete="CASCADE")

     */
    private $idgrade;
    /**
     * Get idgrade
     *
     * @return integer
     */
    public function getIdGrade()
    {
        return $this->idgrade;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Set idgrade
     *
     * @param integer $idgrade
     *
     * @return exam
     */
    public function setIdGrade($idgrade)
    {
        $this->idgrade = $idgrade;

        return $this;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return exam
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }
}

