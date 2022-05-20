<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MaterielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterielRepository::class)]
#[ApiResource]
class Materiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomMateriel;

    #[ORM\Column(type: 'float')]
    private $prixMateriel;

    #[ORM\Column(type: 'integer')]
    private $quantiteMateriel;

    #[ORM\ManyToMany(targetEntity: Chantier::class, mappedBy: 'materiel')]
    private $chantiers;

    #[ORM\ManyToOne(targetEntity: Locatier::class, inversedBy: 'materiels')]
    private $locatier;

    public function __construct()
    {
        $this->chantiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMateriel(): ?string
    {
        return $this->nomMateriel;
    }

    public function setNomMateriel(string $nomMateriel): self
    {
        $this->nomMateriel = $nomMateriel;

        return $this;
    }

    public function getPrixMateriel(): ?float
    {
        return $this->prixMateriel;
    }

    public function setPrixMateriel(float $prixMateriel): self
    {
        $this->prixMateriel = $prixMateriel;

        return $this;
    }

    public function getQuantiteMateriel(): ?int
    {
        return $this->quantiteMateriel;
    }

    public function setQuantiteMateriel(int $quantiteMateriel): self
    {
        $this->quantiteMateriel = $quantiteMateriel;

        return $this;
    }

    /**
     * @return Collection<int, Chantier>
     */
    public function getChantiers(): Collection
    {
        return $this->chantiers;
    }

    public function addChantier(Chantier $chantier): self
    {
        if (!$this->chantiers->contains($chantier)) {
            $this->chantiers[] = $chantier;
            $chantier->addMateriel($this);
        }

        return $this;
    }

    public function removeChantier(Chantier $chantier): self
    {
        if ($this->chantiers->removeElement($chantier)) {
            $chantier->removeMateriel($this);
        }

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
