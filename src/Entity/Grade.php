<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"adherant-grade"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"adherant-grade"})
     */
    private $grade;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"adherant-grade"})
     * 
     */
    private $ceinture;

    /**
     * @ORM\OneToOne(targetEntity=RoleClub::class, mappedBy="grade", cascade={"persist", "remove"})
     */
    private $roleClub;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getCeinture(): ?string
    {
        return $this->ceinture;
    }

    public function setCeinture(string $ceinture): self
    {
        $this->ceinture = $ceinture;

        return $this;
    }

    public function getRoleClub(): ?RoleClub
    {
        return $this->roleClub;
    }

    public function setRoleClub(?RoleClub $roleClub): self
    {
        // unset the owning side of the relation if necessary
        if ($roleClub === null && $this->roleClub !== null) {
            $this->roleClub->setGrade(null);
        }

        // set the owning side of the relation if necessary
        if ($roleClub !== null && $roleClub->getGrade() !== $this) {
            $roleClub->setGrade($this);
        }

        $this->roleClub = $roleClub;

        return $this;
    }
}
