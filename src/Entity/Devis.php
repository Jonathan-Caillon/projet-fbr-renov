<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\CreateDevisAction;
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
    iri: 'http://schema.org/Devis',
    normalizationContext: ['groups' => ['devis:read']],
    denormalizationContext: ['groups' => ['devis:write']],
    itemOperations: ['get','put','delete'],
    collectionOperations: [
        'get',
        'POST' => [
            'controller' => CreateDevisAction::class,
            'validation_groups' => ['Default', 'devis_create'],
            'openapi_context' => [
                'requestBody' => [
                    'content' => [
                        'multipart/form-data' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'file' => [
                                        'type' => 'string',
                                        'format' => 'binary',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ],

)]

class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['devis:read'])]
    #[ApiProperty(identifier:true)]
    private $id;

    #[ORM\Column(type: 'string')]
    #[Groups(['devis:read', 'devis:write'])]
    private $numeroDevis;

    #[ORM\Column(type: 'string')]
    #[Groups(['devis:read', 'devis:write'])]
    private $prixDevis;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['devis:read', 'devis:write'])]
    private $statut;

    #[ORM\ManyToOne(targetEntity: Chantier::class, inversedBy: 'devis')]
    private $chantier;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['devis:read', 'devis:write'])]
    private $paiementAcompte;

    #[ORM\Column(type: 'string', nullable: true)]
   
    #[Groups(['devis:read', 'devis:write'])]
    private $paiementIntermed;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['devis:read', 'devis:write'])]
    private $paiementFinal;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updatedAt;

    public ?string $contentUrl = null;

    /**
     * @Vich\UploadableField(mapping="document", fileNameProperty="filePath")
     */
    #[Groups(['devis:read', 'devis:write'])]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    public ?string $filePath = null;

   
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getNumeroDevis(): ?string
    {
        return $this->numeroDevis;
    }

    public function setNumeroDevis(string $numeroDevis): self
    {
        $this->numeroDevis = $numeroDevis;

        return $this;
    }

    public function getPrixDevis(): ?string
    {
        return $this->prixDevis;
    }

    public function setPrixDevis(string $prixDevis): self
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

    public function getPaiementAcompte(): ?string
    {
        return $this->paiementAcompte;
    }

    public function setPaiementAcompte(?string $paiementAcompte): self
    {
        $this->paiementAcompte = $paiementAcompte;

        return $this;
    }

    public function getPaiementIntermed(): ?string
    {
        return $this->paiementIntermed;
    }

    public function setPaiementIntermed(?string $paiementIntermed): self
    {
        $this->paiementIntermed = $paiementIntermed;

        return $this;
    }

    public function getPaiementFinal(): ?string
    {
        return $this->paiementFinal;
    }

    public function setPaiementFinal(?string $paiementFinal): self
    {
        $this->paiementFinal = $paiementFinal;

        return $this;
    }

    /**
     * Get the value of contentUrl
     */ 
    public function getContentUrl(): ?string
    {
        return $this->contentUrl;
    }

    /**
     * Set the value of contentUrl
     *
     * @return  self
     */ 
    public function setContentUrl(?string $contentUrl): self
    {
        $this->contentUrl = $contentUrl;

        return $this;
    }

    /**
     * Get the value of file
     */ 
    public function getFile(): ?File
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile(?File $file): Devis
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of filePath
     */ 
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    /**
     * Set the value of filePath
     *
     * @return  self
     */ 
    public function setFilePath(?string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    // /**
    //  * Set the value of updatedAt
    //  *
    //  * @return  self
    //  */ 
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

 
}
