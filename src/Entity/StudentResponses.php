<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class StudentResponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Student::class)]
    private ?Student $student = null;

    #[ORM\ManyToOne(targetEntity: QcmGeneration::class)]
    private ?QcmGeneration $qcmGeneration = null;

    #[ORM\Column(type: 'text')]
    private ?string $response = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $score = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $analyse = null;

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

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(string $response): static
    {
        $this->response = $response;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getAnalyse(): ?string
    {
        return $this->analyse;
    }

    public function setAnalyse(?string $analyse): static
    {
        $this->analyse = $analyse;

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

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }

    public function getQcmGeneration(): ?QcmGeneration
    {
        return $this->qcmGeneration;
    }

    public function setQcmGeneration(?QcmGeneration $qcmGeneration): static
    {
        $this->qcmGeneration = $qcmGeneration;

        return $this;
    }


}
