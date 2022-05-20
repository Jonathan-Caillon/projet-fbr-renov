<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChantierRepository::class)]
#[ApiResource()]
class Chantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $intitule;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    private $ville;

    #[ORM\Column(type: 'string', length: 255)]
    private $codePostal;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateModif;

    #[ORM\Column(type: 'integer')]
    private $dureeTravaux;

    #[ORM\Column(type: 'float', nullable: true)]
    private $travauxSupl;

    #[ORM\Column(type: 'float')]
    private $distance;

    #[ORM\Column(type: 'text', nullable: true)]
    private $notePerso;

    #[ORM\Column(type: 'text', nullable: true)]
    private $noteClient;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $urgent; 

    #[ORM\Column(type: 'string', length: 255)]
    private $typeChantier;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'chantier')]
    private $client;

    #[ORM\ManyToMany(targetEntity: CategorieChantier::class, inversedBy: 'chantiers')]
    private $category;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

   

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateModif(): ?\DateTimeInterface
    {
        return $this->dateModif;
    }

    public function setDateModif(?\DateTimeInterface $dateModif): self
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    public function getDureeTravaux(): ?int
    {
        return $this->dureeTravaux;
    }

    public function setDureeTravaux(int $dureeTravaux): self
    {
        $this->dureeTravaux = $dureeTravaux;

        return $this;
    }

    public function getTravauxSupl(): ?float
    {
        return $this->travauxSupl;
    }

    public function setTravauxSupl(?float $travauxSupl): self
    {
        $this->travauxSupl = $travauxSupl;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getNotePerso(): ?string
    {
        return $this->notePerso;
    }

    public function setNotePerso(?string $notePerso): self
    {
        $this->notePerso = $notePerso;

        return $this;
    }

    public function getNoteClient(): ?string
    {
        return $this->noteClient;
    }

    public function setNoteClient(?string $noteClient): self
    {
        $this->noteClient = $noteClient;

        return $this;
    }

    public function getUrgent(): ?bool
    {
        return $this->urgent;
    }

    public function setUrgent(?bool $urgent): self
    {
        $this->urgent = $urgent;

        return $this;
    }

    public function getTypeChantier(): ?string
    {
        return $this->typeChantier;
    }

    public function setTypeChantier(string $typeChantier): self
    {
        $this->typeChantier = $typeChantier;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, CategorieChantier>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(CategorieChantier $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(CategorieChantier $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

}