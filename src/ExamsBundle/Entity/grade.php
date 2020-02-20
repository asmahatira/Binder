<?php

namespace ExamsBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * grade
 *
 * @ORM\Table(name="grade")
 * @ORM\Entity(repositoryClass="ExamsBundle\Repository\gradeRepository")
 */
class grade
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idG;



    /**
     * @ORM\OneToOne(targetEntity="teacher")
     *
     * @ORM\JoinColumn(name="teacher",referencedColumnName="id")
     */
    private $teacher;

    /**
     * @ORM\OneToOne(targetEntity="pupil")
     *
     * @ORM\JoinColumn(name="pupil",referencedColumnName="id")
     */
    private $pupil;

    /**
     * @var float
     * @Assert\NotBlank
     * @Assert\Range(
     *     min = 0,
     *     max = 20,
     *     minMessage = "Grade needs to be at least 0",
     *     maxMessage = "Grade can't be over 20",
     *     )
     * @ORM\Column(name="grade", type="float")
     */
    private $grade;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="exam")
     * @ORM\JoinColumn(name="examname", referencedColumnName="id", onDelete="CASCADE")

     */
    private $examname;
    /**
     * Set idExam
     *
     * @param int $examname
     *
     * @return grade
     */
    public function setExamName($examname)
    {
        $this->examname = $examname;

        return $this;
    }
    /**
     * Get examname
     *
     * @return int
     */
    public function getExamName()
    {
        return $this->examname;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getIdG()
    {
        return $this->idG;
    }




    /**
     * Set teacher
     *
     * @param string $teacher
     *
     * @return grade
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return string
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set pupil
     *
     * @param string $pupil
     *
     * @return grade
     */
    public function setPupil($pupil)
    {
        $this->pupil = $pupil;

        return $this;
    }

    /**
     * Get pupil
     *
     * @return string
     */
    public function getPupil()
    {
        return $this->pupil;
    }

    /**
     * Set grade
     *
     * @param float $grade
     *
     * @return grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return float
     */
    public function getGrade()
    {
        return $this->grade;
    }
}

