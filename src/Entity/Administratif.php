<?php

namespace App\Entity;

use App\Repository\AdministratifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdministratifRepository::class)
 */
class Administratif
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
    private $licence;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $certificatMedical;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPaid;

    /**
     * @ORM\OneToOne(targetEntity=Adherant::class, inversedBy="administratif", cascade={"persist", "remove"})
     */
    private $adherant;

    /**
     * @ORM\OneToOne(targetEntity=Enfant::class, inversedBy="administratif", cascade={"persist", "remove"})
     */
    private $enfant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicence(): ?string
    {
        return $this->licence;
    }

    public function setLicence(?string $licence): self
    {
        $this->licence = $licence;

        return $this;
    }

    public function isCertificatMedical(): ?bool
    {
        return $this->certificatMedical;
    }

    public function setCertificatMedical(?bool $certificatMedical): self
    {
        $this->certificatMedical = $certificatMedical;

        return $this;
    }

    public function isIsPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(?bool $isPaid): self
    {
        $this->isPaid = $isPaid;

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
