<?php

namespace ExamsBundle\Entity;

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
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="session", type="string", length=255)
     */
    private $session;

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
     * Set session
     *
     * @param string $session
     *
     * @return exam
     */
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return string
     */
    public function getSession()
    {
        return $this->session;
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

