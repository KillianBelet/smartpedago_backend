<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class QcmGeneration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Course::class)]
    private ?Course $course = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateGeneration = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $fichierDocxUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $fichierPdfUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $fichierCsvUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $niveauScolaire = null;

    #[ORM\Column(length: 255)]
    private ?string $objectifPedagogique = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->dateGeneration = new \DateTimeImmutable();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateGeneration(): ?\DateTimeImmutable
    {
        return $this->dateGeneration;
    }

    public function setDateGeneration(?\DateTimeImmutable $dateGeneration): static
    {
        $this->dateGeneration = $dateGeneration;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getFichierDocxUrl(): ?string
    {
        return $this->fichierDocxUrl;
    }

    public function setFichierDocxUrl(string $fichierDocxUrl): static
    {
        $this->fichierDocxUrl = $fichierDocxUrl;

        return $this;
    }

    public function getFichierPdfUrl(): ?string
    {
        return $this->fichierPdfUrl;
    }

    public function setFichierPdfUrl(string $fichierPdfUrl): static
    {
        $this->fichierPdfUrl = $fichierPdfUrl;

        return $this;
    }

    public function getFichierCsvUrl(): ?string
    {
        return $this->fichierCsvUrl;
    }

    public function setFichierCsvUrl(string $fichierCsvUrl): static
    {
        $this->fichierCsvUrl = $fichierCsvUrl;

        return $this;
    }

    public function getNiveauScolaire(): ?string
    {
        return $this->niveauScolaire;
    }

    public function setNiveauScolaire(string $niveauScolaire): static
    {
        $this->niveauScolaire = $niveauScolaire;

        return $this;
    }

    public function getObjectifPedagogique(): ?string
    {
        return $this->objectifPedagogique;
    }

    public function setObjectifPedagogique(string $objectifPedagogique): static
    {
        $this->objectifPedagogique = $objectifPedagogique;

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

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): static
    {
        $this->course = $course;

        return $this;
    }


}
