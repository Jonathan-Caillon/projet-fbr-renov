<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepannageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepannageRepository::class)]
#[ApiResource]
class Depannage
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

    #[ORM\Column(type: 'string', length: 255)]
    private $horaireDepannage;

    #[ORM\Column(type: 'float')]
    private $prixDepannage;

    #[ORM\Column(type: 'integer')]
    private $numeroIntervention;

    #[ORM\Column(type: 'float', nullable: true)]
    private $distance;

    #[ORM\Column(type: 'text', nullable: true)]
    private $notePerso;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'depannages')]
    private $client;

    #[ORM\OneToMany(mappedBy: 'depannage', targetEntity: ImageDepannage::class)]
    private $imageDepannages;

    public function __construct()
    {
        $this->imageDepannages = new ArrayCollection();
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

    public function getHoraireDepannage(): ?string
    {
        return $this->horaireDepannage;
    }

    public function setHoraireDepannage(string $horaireDepannage): self
    {
        $this->horaireDepannage = $horaireDepannage;

        return $this;
    }

    public function getPrixDepannage(): ?float
    {
        return $this->prixDepannage;
    }

    public function setPrixDepannage(float $prixDepannage): self
    {
        $this->prixDepannage = $prixDepannage;

        return $this;
    }

    public function getNumeroIntervention(): ?int
    {
        return $this->numeroIntervention;
    }

    public function setNumeroIntervention(int $numeroIntervention): self
    {
        $this->numeroIntervention = $numeroIntervention;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(?float $distance): self
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
     * @return Collection<int, ImageDepannage>
     */
    public function getImageDepannages(): Collection
    {
        return $this->imageDepannages;
    }

    public function addImageDepannage(ImageDepannage $imageDepannage): self
    {
        if (!$this->imageDepannages->contains($imageDepannage)) {
            $this->imageDepannages[] = $imageDepannage;
            $imageDepannage->setDepannage($this);
        }

        return $this;
    }

    public function removeImageDepannage(ImageDepannage $imageDepannage): self
    {
        if ($this->imageDepannages->removeElement($imageDepannage)) {
            // set the owning side to null (unless already changed)
            if ($imageDepannage->getDepannage() === $this) {
                $imageDepannage->setDepannage(null);
            }
        }

        return $this;
    }
}
