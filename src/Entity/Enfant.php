<?php

namespace App\Entity;

use App\Repository\EnfantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnfantRepository::class)
 */
class Enfant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity=Adherant::class, inversedBy="enfants")
     */
    private $parent;

    /**
     * @ORM\OneToOne(targetEntity=Administratif::class, mappedBy="enfant", cascade={"persist", "remove"})
     */
    private $administratif;

    /**
     * @ORM\OneToOne(targetEntity=RoleClub::class, mappedBy="enfant", cascade={"persist", "remove"})
     */
    private $roleClub;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeImmutable
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(?\DateTimeImmutable $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getSexe(): ?int
    {
        return $this->sexe;
    }

    public function setSexe(?int $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getParent(): ?Adherant
    {
        return $this->parent;
    }

    public function setParent(?Adherant $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getAdministratif(): ?Administratif
    {
        return $this->administratif;
    }

    public function setAdministratif(?Administratif $administratif): self
    {
        // unset the owning side of the relation if necessary
        if ($administratif === null && $this->administratif !== null) {
            $this->administratif->setEnfant(null);
        }

        // set the owning side of the relation if necessary
        if ($administratif !== null && $administratif->getEnfant() !== $this) {
            $administratif->setEnfant($this);
        }

        $this->administratif = $administratif;

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
            $this->roleClub->setEnfant(null);
        }

        // set the owning side of the relation if necessary
        if ($roleClub !== null && $roleClub->getEnfant() !== $this) {
            $roleClub->setEnfant($this);
        }

        $this->roleClub = $roleClub;

        return $this;
    }
}
