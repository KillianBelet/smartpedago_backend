<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class QcmStudent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: QcmGeneration::class)]
    private ?QcmGeneration $generation = null;

    #[ORM\ManyToOne(targetEntity: Student::class)]
    private ?Student $student = null;

    #[ORM\Column(length: 255)]
    private ?string $fichierPersonnaliseUrl = null;

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

    public function getFichierPersonnaliseUrl(): ?string
    {
        return $this->fichierPersonnaliseUrl;
    }

    public function setFichierPersonnaliseUrl(string $fichierPersonnaliseUrl): static
    {
        $this->fichierPersonnaliseUrl = $fichierPersonnaliseUrl;

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

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }


}
