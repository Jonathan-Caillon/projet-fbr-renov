<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass: DevisRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['devis:read']],
    denormalizationContext: ['groups' => ['devis:write']],

    collectionOperations: [
        'get',
        'post' => [
            'input_formats' => [
                'multipart' => ['multipart/form-data'],
            ],
        ],
    ],

)]

class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['devis:read'])]
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Groups(['devis:read', 'devis:write'])]
    private $numeroDevis;

    #[ORM\Column(type: 'float')]
    #[Groups(['devis:read', 'devis:write'])]
    private $prixDevis;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['devis:read', 'devis:write'])]
    private $statut;

    #[ORM\ManyToOne(targetEntity: Chantier::class, inversedBy: 'devis')]
    private $chantier;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(['devis:read', 'devis:write'])]
    private $paiementAcompte;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(['devis:read', 'devis:write'])]
    private $paiementIntermed;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(['devis:read', 'devis:write'])]
    private $paiementFinal;

    public ?string $contentUrl = null;

    /**
     * @Vich\UploadableField(mapping="document", fileNameProperty="filePath")
     */
    #[Groups(['devis:read', 'devis:write'])]
    public ?File $file = null;

    #[ORM\Column(nullable: true)]
    public ?string $filePath = null;

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

    public function getChantier(): ?Chantier
    {
        return $this->chantier;
    }

    public function setChantier(?Chantier $chantier): self
    {
        $this->chantier = $chantier;

        return $this;
    }

    public function getPaiementAcompte(): ?float
    {
        return $this->paiementAcompte;
    }

    public function setPaiementAcompte(?float $paiementAcompte): self
    {
        $this->paiementAcompte = $paiementAcompte;

        return $this;
    }

    public function getPaiementIntermed(): ?float
    {
        return $this->paiementIntermed;
    }

    public function setPaiementIntermed(?float $paiementIntermed): self
    {
        $this->paiementIntermed = $paiementIntermed;

        return $this;
    }

    public function getPaiementFinal(): ?float
    {
        return $this->paiementFinal;
    }

    public function setPaiementFinal(?float $paiementFinal): self
    {
        $this->paiementFinal = $paiementFinal;

        return $this;
    }
}
