<?php

namespace App\Entity;

use App\Repository\UrgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UrgenceRepository::class)
 */
class Urgence
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=Adherant::class, mappedBy="urgence")
     */
    private $adherant;

    public function __construct()
    {
        $this->adherant = new ArrayCollection();
    }


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

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection<int, Adherant>
     */
    public function getAdherant(): Collection
    {
        return $this->adherant;
    }

    public function addAdherant(Adherant $adherant): self
    {
        if (!$this->adherant->contains($adherant)) {
            $this->adherant[] = $adherant;
            $adherant->setUrgence($this);
        }

        return $this;
    }

    public function removeAdherant(Adherant $adherant): self
    {
        if ($this->adherant->removeElement($adherant)) {
            // set the owning side to null (unless already changed)
            if ($adherant->getUrgence() === $this) {
                $adherant->setUrgence(null);
            }
        }

        return $this;
    }

}
