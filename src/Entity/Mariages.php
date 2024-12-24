<?php

namespace App\Entity;

use App\Enum\MariageType;
use App\Repository\MariagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MariagesRepository::class)]
class Mariages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_mariage = null;

    #[ORM\ManyToOne(targetEntity: Confirmations::class)]
    #[ORM\JoinColumn(name: "id_epoux1", referencedColumnName: "id_confirmation", nullable: false)]
    private ?Confirmations $epoux1 = null;

    #[ORM\ManyToOne(targetEntity: Confirmations::class)]
    #[ORM\JoinColumn(name: "id_epoux2_confirmation", referencedColumnName: "id_confirmation", nullable: true)]
    private ?Confirmations $epoux2Confirmation = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)]
    #[ORM\JoinColumn(name: "id_epoux2_non_paroissien", referencedColumnName: "id_non_paroissien", nullable: true)]
    private ?NonParoissiens $epoux2NonParoissien = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_mariage = null;

    #[ORM\Column(length: 60)]
    private ?string $ministre = null;

    #[ORM\Column(type: 'string', enumType: MariageType::class)]
    private MariageType $type_mariage;

    #[ORM\Column(length: 60)]
    private ?string $lieu_mariage = null;

    public function getIdMariage(): ?string
    {
        return $this->id_mariage;
    }

    public function getEpoux1(): ?Confirmations
    {
        return $this->epoux1;
    }

    public function setEpoux1(Confirmations $epoux1): static
    {
        $this->epoux1 = $epoux1;
        return $this;
    }

    public function getEpoux2Confirmation(): ?Confirmations
    {
        return $this->epoux2Confirmation;
    }

    public function setEpoux2Confirmation(?Confirmations $epoux2Confirmation): static
    {
        $this->epoux2Confirmation = $epoux2Confirmation;
        return $this;
    }

    public function getEpoux2NonParoissien(): ?NonParoissiens
    {
        return $this->epoux2NonParoissien;
    }

    public function setEpoux2NonParoissien(?NonParoissiens $epoux2NonParoissien): static
    {
        $this->epoux2NonParoissien = $epoux2NonParoissien;
        return $this;
    }

    public function getDateMariage(): ?\DateTimeInterface
    {
        return $this->date_mariage;
    }

    public function setDateMariage(\DateTimeInterface $date_mariage): static
    {
        $this->date_mariage = $date_mariage;
        return $this;
    }

    public function getMinistre(): ?string
    {
        return $this->ministre;
    }

    public function setMinistre(string $ministre): static
    {
        $this->ministre = $ministre;
        return $this;
    }

    public function getTypeMariage(): MariageType
    {
        return $this->type_mariage;
    }

    public function setTypeMariage(MariageType $type_mariage): static
    {
        $this->type_mariage = $type_mariage;
        return $this;
    }

    public function getLieuMariage(): ?string
    {
        return $this->lieu_mariage;
    }

    public function setLieuMariage(string $lieu_mariage): static
    {
        $this->lieu_mariage = $lieu_mariage;
        return $this;
    }
}
