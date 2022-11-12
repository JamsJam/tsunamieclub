<?php

namespace App\Entity;

use App\Repository\AdherantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
  
/**
 * @ORM\Entity(repositoryClass=AdherantRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Adherant implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"adherant"});
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * 
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string");
     * 
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"adherant"});
     */
    private $isVerified = false;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"adherant"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"adherant"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="date_immutable")
     * 
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"adherant"})
     */
    private $idRole;
    

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, mappedBy="adherant", cascade={"persist", "remove"})
     * @Groups({"adherant-contact"})
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity=Urgence::class, inversedBy="adherant")
     */
    private $urgence;

    /**
     * @ORM\OneToOne(targetEntity=RoleClub::class, mappedBy="adherant", cascade={"persist", "remove"})
     * @Groups({"adherant-roleClub"})
     */
    private $roleClub;

    /**
     * @ORM\OneToOne(targetEntity=Administratif::class, mappedBy="adherant", cascade={"persist", "remove"})
     * @Groups({"adherant-administratif"})
     */
    private $administratif;

    /**
     * @ORM\OneToMany(targetEntity=Enfant::class, mappedBy="parent")
     */
    private $enfants;

    /**
     * @ORM\ManyToMany(targetEntity=Mail::class, mappedBy="destinataire")
     */
    private $mails;

    /**
     * @ORM\ManyToMany(targetEntity=Evenement::class, mappedBy="participant")
     */
    private $evenements;

    public function __construct()
    {
        $this->enfants = new ArrayCollection();
        $this->mails = new ArrayCollection();
        $this->evenements = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeImmutable
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeImmutable $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getSexe(): ?int
    {
        return $this->sexe;
    }

    public function setSexe(int $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getIdRole(): ?int
    {
        return $this->idRole;
    }

    public function setIdRole(int $idRole): self
    {
        $this->idRole = $idRole;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        // unset the owning side of the relation if necessary
        if ($contact === null && $this->contact !== null) {
            $this->contact->setAdherant(null);
        }

        // set the owning side of the relation if necessary
        if ($contact !== null && $contact->getAdherant() !== $this) {
            $contact->setAdherant($this);
        }

        $this->contact = $contact;

        return $this;
    }

    public function getUrgence(): ?Urgence
    {
        return $this->urgence;
    }

    public function setUrgence(?Urgence $urgence): self
    {
        $this->urgence = $urgence;

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
            $this->roleClub->setAdherant(null);
        }

        // set the owning side of the relation if necessary
        if ($roleClub !== null && $roleClub->getAdherant() !== $this) {
            $roleClub->setAdherant($this);
        }

        $this->roleClub = $roleClub;

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
            $this->administratif->setAdherant(null);
        }

        // set the owning side of the relation if necessary
        if ($administratif !== null && $administratif->getAdherant() !== $this) {
            $administratif->setAdherant($this);
        }

        $this->administratif = $administratif;

        return $this;
    }

    /**
     * @return Collection<int, Enfant>
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Enfant $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants[] = $enfant;
            $enfant->setParent($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): self
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getParent() === $this) {
                $enfant->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mail>
     */
    public function getMails(): Collection
    {
        return $this->mails;
    }

    public function addMail(Mail $mail): self
    {
        if (!$this->mails->contains($mail)) {
            $this->mails[] = $mail;
            $mail->addDestinataire($this);
        }

        return $this;
    }

    public function removeMail(Mail $mail): self
    {
        if ($this->mails->removeElement($mail)) {
            $mail->removeDestinataire($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->addParticipant($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            $evenement->removeParticipant($this);
        }

        return $this;
    }


}
