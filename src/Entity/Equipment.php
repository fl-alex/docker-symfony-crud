<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datestart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateend = null;

    #[ORM\Column(nullable: true)]
    private ?string $characteristics = null;

    #[ORM\ManyToOne(inversedBy: 'equipment')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ObjectType $ObjectType = null;

    #[ORM\ManyToOne(inversedBy: 'equipment')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\ManyToOne(inversedBy: 'equipment')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\OneToMany(mappedBy: 'equipment', targetEntity: File::class, orphanRemoval: true, cascade:["persist"])]
    private Collection $file;

    #[ORM\OneToMany(mappedBy: 'equipment', targetEntity: Objectservice::class, orphanRemoval: true)]
    private Collection $ObjectService;

    public function __construct()
    {
        $this->file = new ArrayCollection();
        $this->ObjectService = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDatestart(): ?\DateTimeInterface
    {
        return $this->datestart;
    }

    public function setDatestart(\DateTimeInterface $datestart): static
    {
        $this->datestart = $datestart;

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

    public function getCharacteristics(): ?string
    {
        return $this->characteristics;
    }

    public function setCharacteristics(?string $characteristics): static
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    public function getObjectType(): ?ObjectType
    {
        return $this->ObjectType;
    }

    public function setObjectType(?ObjectType $ObjectType): static
    {
        $this->ObjectType = $ObjectType;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFile(): Collection
    {
        return $this->file;
    }

    public function addFile(File $file): static
    {
        if (!$this->file->contains($file)) {
            $this->file->add($file);
            $file->setEquipment($this);
        }

        return $this;
    }

    public function removeFile(File $file): static
    {
        if ($this->file->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getEquipment() === $this) {
                $file->setEquipment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Objectservice>
     */
    public function getObjectService(): Collection
    {
        return $this->ObjectService;
    }

    public function addObjectService(Objectservice $objectService): static
    {
        if (!$this->ObjectService->contains($objectService)) {
            $this->ObjectService->add($objectService);
            $objectService->setEquipment($this);
        }

        return $this;
    }

    public function removeObjectService(Objectservice $objectService): static
    {
        if ($this->ObjectService->removeElement($objectService)) {
            // set the owning side to null (unless already changed)
            if ($objectService->getEquipment() === $this) {
                $objectService->setEquipment(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
