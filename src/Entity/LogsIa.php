<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class LogsIa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: QcmGeneration::class)]
    private ?QcmGeneration $generation = null;

    #[ORM\Column(type: 'float')]
    private ?float $tempsTraitement = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $erreurs = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $resultatIaSummary = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTempsTraitement(): ?float
    {
        return $this->tempsTraitement;
    }

    public function setTempsTraitement(float $tempsTraitement): static
    {
        $this->tempsTraitement = $tempsTraitement;

        return $this;
    }

    public function getErreurs(): ?string
    {
        return $this->erreurs;
    }

    public function setErreurs(?string $erreurs): static
    {
        $this->erreurs = $erreurs;

        return $this;
    }

    public function getResultatIaSummary(): ?string
    {
        return $this->resultatIaSummary;
    }

    public function setResultatIaSummary(?string $resultatIaSummary): static
    {
        $this->resultatIaSummary = $resultatIaSummary;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getGeneration(): ?QcmGeneration
    {
        return $this->generation;
    }

    public function setGeneration(?QcmGeneration $generation): static
    {
        $this->generation = $generation;

        return $this;
    }


}
