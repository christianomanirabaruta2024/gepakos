<?php

namespace App\Entity;

use App\Repository\BaptemesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BaptemesRepository::class)]
class Baptemes
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'bigint')]
    private ?int $id_bapteme = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date_bapteme = null;

    #[ORM\Column(length: 60)]
    private ?string $lieu_bapteme = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'parrain', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $parrain = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'marraine', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $marraine = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'id_paroissien', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $id_paroissien = null;

    #[ORM\Column(length: 60)]
    private ?string $ministre = null;

    public function getIdBapteme(): ?int
    {
        return $this->id_bapteme;
    }

    public function getDateBapteme(): ?\DateTimeInterface
    {
        return $this->date_bapteme;
    }

    public function setDateBapteme(\DateTimeInterface $date_bapteme): static
    {
        $this->date_bapteme = $date_bapteme;

        return $this;
    }

    public function getLieuBapteme(): ?string
    {
        return $this->lieu_bapteme;
    }

    public function setLieuBapteme(string $lieu_bapteme): static
    {
        $this->lieu_bapteme = $lieu_bapteme;

        return $this;
    }

    public function getParrain(): ?Paroissiens
    {
        return $this->parrain;
    }

    public function setParrain(?Paroissiens $parrain): static
    {
        $this->parrain = $parrain;

        return $this;
    }

    public function getMarraine(): ?Paroissiens
    {
        return $this->marraine;
    }

    public function setMarraine(?Paroissiens $marraine): static
    {
        $this->marraine = $marraine;

        return $this;
    }

    public function getIdParoissien(): ?Paroissiens
    {
        return $this->id_paroissien;
    }

    public function setIdParoissien(?Paroissiens $id_paroissien): static
    {
        $this->id_paroissien = $id_paroissien;

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
