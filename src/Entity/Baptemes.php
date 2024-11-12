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
    #[ORM\JoinColumn(name: 'mere', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $mere = null;
    
    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'pere', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $pere = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'parrain', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $parrain = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'marraine', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $marraine = null;


    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'pere_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?Paroissiens $pere_non_paroissien = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'mere_on_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?Paroissiens $mere_on_paroissien = null;


    #[ORM\ManyToOne(targetEntity: Paroissiens::class)] // Relier à l'entité Paroissien
    #[ORM\JoinColumn(name: 'id_paroissien', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $id_paroissien = null;

    #[ORM\Column(length: 60)]
    private ?string $ministre = null;

    #[ORM\Column(length: 60)]
    private ?string $registre_bapteme = null;

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

    public function getRegistreBapteme(): ?string
    {
        return $this->registre_bapteme;
    }

    public function setRegistreBapteme(string $registre_bapteme): static
    {
        $this->registre_bapteme = $registre_bapteme;

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

    
    public function getMere(): ?Paroissiens
    {
        return $this->mere;
    }

    public function setMere(?Paroissiens $mere): static
    {
        $this->mere = $mere;

        return $this;
    }

    public function getPere(): ?Paroissiens
    {
        return $this->pere;
    }

    public function setPere(?Paroissiens $pere): static
    {
        $this->pere = $pere;

        return $this;
    }

    public function getPereNonParoissien(): ?Paroissiens
    {
        return $this->pere_non_paroissien;
    }


    public function setPereNonParoissien(?Paroissiens $pere_non_paroissien): static
    {
        $this->pere_non_paroissien = $pere_non_paroissien;

        return $this;
    }
    public function getMereNonParoissien(): ?Paroissiens
    {
        return $this->mere_non_paroissien;
    }

    public function setMereNonParoissien(?Paroissiens $mere_non_paroissien): static
    {
        $this->mere_non_paroissien = $mere_non_paroissien;

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
