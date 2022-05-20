<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
#[ApiResource]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $numeroDevis;

    #[ORM\Column(type: 'float')]
    private $prixDevis;

    #[ORM\Column(type: 'string', length: 255)]
    private $statut;

    #[ORM\Column(type: 'string', nullable: true)]
    private $paiement;

    #[ORM\ManyToOne(targetEntity: Chantier::class, inversedBy: 'devis')]
    private $chantier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDevis(): ?int
    {
        return $this->numeroDevis;
    }

    public function setNumeroDevis(int $numeroDevis): self
    {
        $this->numeroDevis = $numeroDevis;

        return $this;
    }

    public function getPrixDevis(): ?float
    {
        return $this->prixDevis;
    }

    public function setPrixDevis(float $prixDevis): self
    {
        $this->prixDevis = $prixDevis;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPaiement(): ?string
    {
        return $this->paiement;
    }

    public function setPaiement(?string $paiement): self
    {
        $this->paiement = $paiement;

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
}
