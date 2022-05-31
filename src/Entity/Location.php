<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
#[ApiResource]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\Column(type: 'float')]
    private $prix;

    #[ORM\ManyToOne(targetEntity: Chantier::class, inversedBy: 'locations')]
    private $chantier;

    #[ORM\ManyToOne(targetEntity: Materiel::class, inversedBy: 'locations')]
    private $materiel;

    #[ORM\ManyToOne(targetEntity: Locatier::class, inversedBy: 'locations')]
    private $locatier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getChantier(): ?Chantier
    {
        return $this->chantier;
    }

    public function setChantier(?Chantier $chantier): self
    {
        $this->chantier = $chantier;

        return $this;
    }

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(?Materiel $materiel): self
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getLocatier(): ?Locatier
    {
        return $this->locatier;
    }

    public function setLocatier(?Locatier $locatier): self
    {
        $this->locatier = $locatier;

        return $this;
    }
}
