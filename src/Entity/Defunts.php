<?php

namespace App\Entity;

use App\Repository\DefuntsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DefuntsRepository::class)]
class Defunts
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'bigint')]
    private ?int $id_defunt = null; // Utilisation de 'int' pour l'identifiant

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_paroissien', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $paroissien = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_defunt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_funerailles = null;

    #[ORM\Column(length: 25)]
    private ?string $lieu_funerailles = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $ministre = null;

    #[ORM\Column(length: 45)]
    private ?string $nom_conjoint_ou_pere = null;

    public function getIdDefunt(): ?int
    {
        return $this->id_defunt;
    }

    public function getParoissien(): ?Paroissiens
    {
        return $this->paroissien;
    }

    public function setParoissien(?Paroissiens $paroissien): static
    {
        $this->paroissien = $paroissien;

        return $this;
    }

    public function getDateDefunt(): ?\DateTimeInterface
    {
        return $this->date_defunt;
    }

    public function setDateDefunt(\DateTimeInterface $date_defunt): static
    {
        $this->date_defunt = $date_defunt;

        return $this;
    }

    public function getDateFunerailles(): ?\DateTimeInterface
    {
        return $this->date_funerailles;
    }

    public function setDateFunerailles(\DateTimeInterface $date_funerailles): static
    {
        $this->date_funerailles = $date_funerailles;

        return $this;
    }

    public function getLieuFunerailles(): ?string
    {
        return $this->lieu_funerailles;
    }

    public function setLieuFunerailles(string $lieu_funerailles): static
    {
        $this->lieu_funerailles = $lieu_funerailles;

        return $this;
    }

    public function getMinistre(): ?string
    {
        return $this->ministre;
    }

    public function setMinistre(?string $ministre): static
    {
        $this->ministre = $ministre;

        return $this;
    }

    public function getNomConjointOuPere(): ?string
    {
        return $this->nom_conjoint_ou_pere;
    }

    public function setNomConjointOuPere(string $nom_conjoint_ou_pere): static
    {
        $this->nom_conjoint_ou_pere = $nom_conjoint_ou_pere;

        return $this;
    }
}
