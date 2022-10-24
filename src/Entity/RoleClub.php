<?php

namespace App\Entity;

use App\Repository\RoleClubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleClubRepository::class)
 */
class RoleClub
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $competiteur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $arbitre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $commissaire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $professeur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pole;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $kata;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $staf;

    /**
     * @ORM\OneToOne(targetEntity=Adherant::class, inversedBy="roleClub", cascade={"persist", "remove"})
     */
    private $adherant;

    /**
     * @ORM\OneToOne(targetEntity=Grade::class, inversedBy="roleClub", cascade={"persist", "remove"})
     */
    private $grade;

    /**
     * @ORM\OneToOne(targetEntity=Enfant::class, inversedBy="roleClub", cascade={"persist", "remove"})
     */
    private $enfant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isCompetiteur(): ?bool
    {
        return $this->competiteur;
    }

    public function setCompetiteur(?bool $competiteur): self
    {
        $this->competiteur = $competiteur;

        return $this;
    }

    public function isArbitre(): ?bool
    {
        return $this->arbitre;
    }

    public function setArbitre(?bool $arbitre): self
    {
        $this->arbitre = $arbitre;

        return $this;
    }

    public function isCommissaire(): ?bool
    {
        return $this->commissaire;
    }

    public function setCommissaire(?bool $commissaire): self
    {
        $this->commissaire = $commissaire;

        return $this;
    }

    public function isProfesseur(): ?bool
    {
        return $this->professeur;
    }

    public function setProfesseur(?bool $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function isPole(): ?bool
    {
        return $this->pole;
    }

    public function setPole(?bool $pole): self
    {
        $this->pole = $pole;

        return $this;
    }

    public function isKata(): ?bool
    {
        return $this->kata;
    }

    public function setKata(?bool $kata): self
    {
        $this->kata = $kata;

        return $this;
    }

    public function isStaf(): ?bool
    {
        return $this->staf;
    }

    public function setStaf(?bool $staf): self
    {
        $this->staf = $staf;

        return $this;
    }

    public function getAdherant(): ?Adherant
    {
        return $this->adherant;
    }

    public function setAdherant(?Adherant $adherant): self
    {
        $this->adherant = $adherant;

        return $this;
    }

    public function getGrade(): ?grade
    {
        return $this->grade;
    }

    public function setGrade(?grade $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getEnfant(): ?Enfant
    {
        return $this->enfant;
    }

    public function setEnfant(?Enfant $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }
}
