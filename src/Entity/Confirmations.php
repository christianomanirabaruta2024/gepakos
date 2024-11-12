<?php

namespace App\Entity;

use App\Repository\ConfirmationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConfirmationsRepository::class)]
class Confirmations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_confirmation = null; // Utilisation de id_confirmation comme clé primaire

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Clé étrangère reliée à Paroissiens
    #[ORM\JoinColumn(name: "id_paroissien", referencedColumnName: "id_paroissien", nullable: false)]
    private ?Paroissiens $paroissien = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_confirmation = null;

    #[ORM\Column(length: 35)]
    private ?string $lieu_confirmation = null;

    #[ORM\Column(length: 45)]
    private ?string $ministre = null;

    public function getIdConfirmation(): ?string
    {
        return $this->id_confirmation;
    }

    public function setIdConfirmation(string $id_confirmation): static
    {
        $this->id_confirmation = $id_confirmation;

        return $this;
    }

    public function getParoissien(): ?Paroissiens
    {
        return $this->paroissien;
    }

    public function setParoissien(Paroissiens $paroissien): static
    {
        $this->paroissien = $paroissien;

        return $this;
    }

    public function getDateConfirmation(): ?\DateTimeInterface
    {
        return $this->date_confirmation;
    }

    public function setDateConfirmation(\DateTimeInterface $date_confirmation): static
    {
        $this->date_confirmation = $date_confirmation;

        return $this;
    }

    public function getLieuConfirmation(): ?string
    {
        return $this->lieu_confirmation;
    }

    public function setLieuConfirmation(string $lieu_confirmation): static
    {
        $this->lieu_confirmation = $lieu_confirmation;

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
}
