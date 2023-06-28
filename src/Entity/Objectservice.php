<?php

namespace App\Entity;

use App\Repository\ObjectserviceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjectserviceRepository::class)]
class Objectservice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ServiceType $ServiceType = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ServiceState $ServiceState = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateplan = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datefact = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateend = null;

    #[ORM\ManyToOne(inversedBy: 'ObjectService')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipment $equipment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceType(): ?ServiceType
    {
        return $this->ServiceType;
    }

    public function setServiceType(?ServiceType $ServiceType): static
    {
        $this->ServiceType = $ServiceType;

        return $this;
    }

    public function getServiceState(): ?ServiceState
    {
        return $this->ServiceState;
    }

    public function setServiceState(?ServiceState $ServiceState): static
    {
        $this->ServiceState = $ServiceState;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateplan(): ?\DateTimeInterface
    {
        return $this->dateplan;
    }

    public function setDateplan(\DateTimeInterface $dateplan): static
    {
        $this->dateplan = $dateplan;

        return $this;
    }

    public function getDatefact(): ?\DateTimeInterface
    {
        return $this->datefact;
    }

    public function setDatefact(?\DateTimeInterface $datefact): static
    {
        $this->datefact = $datefact;

        return $this;
    }

    public function getDateend(): ?\DateTimeInterface
    {
        return $this->dateend;
    }

    public function setDateend(?\DateTimeInterface $dateend): static
    {
        $this->dateend = $dateend;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): static
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
