<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ChantierRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:chantier']]
)]
class Chantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:collection','read:chantier'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:chantier'])]
    private $intitule;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:chantier'])]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:chantier'])]
    private $ville;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:chantier'])]
    private $codePostal;

    #[ORM\Column(type: 'date')]
    #[Groups(['read:collection','read:chantier'])]
    private $date;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['read:collection','read:chantier'])]
    private $dateModif;

    #[ORM\Column(type: 'integer')]
    #[Groups(['read:collection','read:chantier'])]
    private $dureeTravaux;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(['read:collection','read:chantier'])]
    private $travauxSupl;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:collection','read:chantier'])]
    private $distance;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['read:collection','read:chantier'])]
    private $notePerso;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['read:collection','read:chantier'])]
    private $noteClient;

    #[ORM\Column(type: 'boolean', nullable: true)]
    #[Groups(['read:collection','read:chantier'])]
    private $urgent;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'chantier')]
    #[Groups(['read:chantier'])]
    private $client;

    #[ORM\ManyToMany(targetEntity: CategorieChantier::class, inversedBy: 'chantiers')]
    private $category;

    #[ORM\OneToMany(mappedBy: 'chantier', targetEntity: Devis::class)]
    #[Groups(['read:collection','read:chantier'])]
    private $devis;

    #[ORM\OneToMany(mappedBy: 'chantier', targetEntity: ImageChantier::class)]
    #[Groups(['read:chantier'])]
    private $imageChantiers;

    #[ORM\OneToMany(mappedBy: 'chantier', targetEntity: Location::class)]
    #[Groups(['read:chantier'])]
    private $locations;
    
    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->devis = new ArrayCollection();
        $this->imageChantiers = new ArrayCollection();
        $this->locations = new ArrayCollection();
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

    /**
     * @return Collection<int, Devis>
     */
    public function getDevis(): Collection
    {
        return $this->devis;
    }

    public function addDevis(Devis $devis): self
    {
        if (!$this->devis->contains($devis)) {
            $this->devis[] = $devis;
            $devis->setChantier($this);
        }

        return $this;
    }

    public function removeDevis(Devis $devis): self
    {
        if ($this->devis->removeElement($devis)) {
            // set the owning side to null (unless already changed)
            if ($devis->getChantier() === $this) {
                $devis->setChantier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ImageChantier>
     */
    public function getImageChantiers(): Collection
    {
        return $this->imageChantiers;
    }

    public function addImageChantier(ImageChantier $imageChantier): self
    {
        if (!$this->imageChantiers->contains($imageChantier)) {
            $this->imageChantiers[] = $imageChantier;
            $imageChantier->setChantier($this);
        }

        return $this;
    }

    public function removeImageChantier(ImageChantier $imageChantier): self
    {
        if ($this->imageChantiers->removeElement($imageChantier)) {
            // set the owning side to null (unless already changed)
            if ($imageChantier->getChantier() === $this) {
                $imageChantier->setChantier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setChantier($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getChantier() === $this) {
                $location->setChantier(null);
            }
        }

        return $this;
    }
 

}
