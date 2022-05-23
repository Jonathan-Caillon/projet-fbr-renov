<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImageDepannageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageDepannageRepository::class)]
#[ApiResource]
class ImageDepannage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\ManyToOne(targetEntity: Depannage::class, inversedBy: 'imageDepannages')]
    private $depannage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDepannage(): ?Depannage
    {
        return $this->depannage;
    }

    public function setDepannage(?Depannage $depannage): self
    {
        $this->depannage = $depannage;

        return $this;
    }
}
