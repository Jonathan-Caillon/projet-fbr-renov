<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepannageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DepannageRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:depannage']]
)]
#[UniqueEntity(fields :"numeroIntervention",
 message: "Ce numero d'intervention est déjà utilisé !")]
class Depannage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:collection','read:depannage'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:depannage'])]
    private $intitule;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:depannage'])]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:depannage'])]
    private $ville;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:depannage'])]
    private $codePostal;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection','read:depannage'])]
    private $horaireDepannage;

    #[ORM\Column(type: 'float')]
    #[Groups(['read:collection','read:depannage'])]
    private $prixDepannage;

    #[ORM\Column(type: 'integer')]
    #[Groups(['read:collection','read:depannage'])]
    private $numeroIntervention;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(['read:collection','read:depannage'])]
    private $distance;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['read:collection','read:depannage'])]
    private $notePerso;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'depannages')]
    #[Groups(['read:depannage'])]
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
