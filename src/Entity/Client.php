<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource(attributes: ["pagination_items_per_page" => 5],
    normalizationContext: ['groups' => ['read:collection']])]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:collection'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection'])]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection'])]
    private $prenom;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection'])]
    private $ville;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection'])]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection'])]
    private $codePostal;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection'])]
    private $telephone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['read:collection'])]
    private $raisonSociale;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Chantier::class)]
    #[Groups(['read:collection'])]
    private $chantier;
    
    #[ORM\OneToOne(targetEntity: User::class, cascade: ['persist', 'remove'])]
    #[Groups(['read:collection'])]
    private $user;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Depannage::class)]
    #[Groups(['read:collection'])]
    private $depannages;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['read:collection'])]
    private $email;

    public function __construct()
    {
        $this->chantier = new ArrayCollection();
        $this->depannages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(?string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    /**
     * @return Collection<int, Chantier>
     */
    public function getChantier(): Collection
    {
        return $this->chantier;
    }

    public function addChantier(Chantier $chantier): self
    {
        if (!$this->chantier->contains($chantier)) {
            $this->chantier[] = $chantier;
            $chantier->setClient($this);
        }

        return $this;
    }

    public function removeChantier(Chantier $chantier): self
    {
        if ($this->chantier->removeElement($chantier)) {
            // set the owning side to null (unless already changed)
            if ($chantier->getClient() === $this) {
                $chantier->setClient(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Depannage>
     */
    public function getDepannages(): Collection
    {
        return $this->depannages;
    }

    public function addDepannage(Depannage $depannage): self
    {
        if (!$this->depannages->contains($depannage)) {
            $this->depannages[] = $depannage;
            $depannage->setClient($this);
        }

        return $this;
    }

    public function removeDepannage(Depannage $depannage): self
    {
        if ($this->depannages->removeElement($depannage)) {
            // set the owning side to null (unless already changed)
            if ($depannage->getClient() === $this) {
                $depannage->setClient(null);
            }
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
