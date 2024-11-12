<?php

namespace App\Entity;

use App\Repository\CommunionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommunionsRepository::class)]
class Communions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_communion = null; // Clé primaire modifiée ici

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_paroissien = null;

    #[ORM\OneToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissiens
    #[ORM\JoinColumn(name: 'id_paroissien', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $paroissien = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_communion = null;

    #[ORM\Column(length: 30)]
    private ?string $lieu_communion = null;

    #[ORM\Column(length: 50)]
    private ?string $ministre = null;

    // Supprimer la fonction getId() car id n'existe plus
    public function getIdCommunion(): ?string
    {
        return $this->id_communion;
    }

    public function setIdCommunion(string $id_communion): static
    {
        $this->id_communion = $id_communion;

        return $this;
    }

    public function getIdParoissien(): ?string
    {
        return $this->id_paroissien;
    }

    public function setIdParoissien(string $id_paroissien): static
    {
        $this->id_paroissien = $id_paroissien;

        return $this;
    }

    public function getDateCommunion(): ?\DateTimeInterface
    {
        return $this->date_communion;
    }

    public function setDateCommunion(\DateTimeInterface $date_communion): static
    {
        $this->date_communion = $date_communion;

        return $this;
    }

    public function getLieuCommunion(): ?string
    {
        return $this->lieu_communion;
    }

    public function setLieuCommunion(string $lieu_communion): static
    {
        $this->lieu_communion = $lieu_communion;

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
