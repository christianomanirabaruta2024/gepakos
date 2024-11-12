<?php

namespace App\Entity;

use App\Repository\InscriptionMariagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionMariagesRepository::class)]
class InscriptionMariages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private ?int $id_inscription = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_futur_epoux1_paroissien', referencedColumnName: 'id_paroissien', nullable: true)]
    private ?Paroissiens $futurEpoux1Paroissien = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_futur_epoux2_paroissien', referencedColumnName: 'id_paroissien', nullable: true)]
    private ?Paroissiens $futurEpoux2Paroissien = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)]
    #[ORM\JoinColumn(name: 'id_futur_epoux1_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?NonParoissiens $futurEpoux1NonParoissien = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)]
    #[ORM\JoinColumn(name: 'id_futur_epoux2_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?NonParoissiens $futurEpoux2NonParoissien = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(type: 'boolean')]
    private bool $approuve = false;

    // Relations pour le parrain et la marraine
    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_parrain', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $parrain = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_marraine', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $marraine = null;

    // Relations pour les parents des futurs mariés (paroissiens)
    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_pere_epoux1', referencedColumnName: 'id_paroissien', nullable: true)]
    private ?Paroissiens $pereEpoux1 = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_mere_epoux1', referencedColumnName: 'id_paroissien', nullable: true)]
    private ?Paroissiens $mereEpoux1 = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_pere_epoux2', referencedColumnName: 'id_paroissien', nullable: true)]
    private ?Paroissiens $pereEpoux2 = null;

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_mere_epoux2', referencedColumnName: 'id_paroissien', nullable: true)]
    private ?Paroissiens $mereEpoux2 = null;

    // Relations pour les parents des futurs mariés (non paroissiens)
    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)]
    #[ORM\JoinColumn(name: 'id_pere_epoux1_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?NonParoissiens $pereEpoux1NonParoissien = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)]
    #[ORM\JoinColumn(name: 'id_mere_epoux1_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?NonParoissiens $mereEpoux1NonParoissien = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)]
    #[ORM\JoinColumn(name: 'id_pere_epoux2_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?NonParoissiens $pereEpoux2NonParoissien = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)]
    #[ORM\JoinColumn(name: 'id_mere_epoux2_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)]
    private ?NonParoissiens $mereEpoux2NonParoissien = null;

    // Getters et setters pour chaque attribut

    public function getIdInscription(): ?int
    {
        return $this->id_inscription;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): static
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function isApprouve(): bool
    {
        return $this->approuve;
    }

    public function setApprouve(bool $approuve): static
    {
        $this->approuve = $approuve;

        return $this;
    }

    // Getters et setters pour les relations (futur époux, parrain, marraine, parents paroissiens)
    public function getFuturEpoux1Paroissien(): ?Paroissiens
    {
        return $this->futurEpoux1Paroissien;
    }

    public function setFuturEpoux1Paroissien(?Paroissiens $futurEpoux1Paroissien): static
    {
        $this->futurEpoux1Paroissien = $futurEpoux1Paroissien;

        return $this;
    }

    public function getFuturEpoux2Paroissien(): ?Paroissiens
    {
        return $this->futurEpoux2Paroissien;
    }

    public function setFuturEpoux2Paroissien(?Paroissiens $futurEpoux2Paroissien): static
    {
        $this->futurEpoux2Paroissien = $futurEpoux2Paroissien;

        return $this;
    }

    public function getFuturEpoux1NonParoissien(): ?NonParoissiens
    {
        return $this->futurEpoux1NonParoissien;
    }

    public function setFuturEpoux1NonParoissien(?NonParoissiens $futurEpoux1NonParoissien): static
    {
        $this->futurEpoux1NonParoissien = $futurEpoux1NonParoissien;

        return $this;
    }

    public function getFuturEpoux2NonParoissien(): ?NonParoissiens
    {
        return $this->futurEpoux2NonParoissien;
    }

    public function setFuturEpoux2NonParoissien(?NonParoissiens $futurEpoux2NonParoissien): static
    {
        $this->futurEpoux2NonParoissien = $futurEpoux2NonParoissien;

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

    public function getPereEpoux1(): ?Paroissiens
    {
        return $this->pereEpoux1;
    }

    public function setPereEpoux1(?Paroissiens $pereEpoux1): static
    {
        $this->pereEpoux1 = $pereEpoux1;

        return $this;
    }

    public function getMereEpoux1(): ?Paroissiens
    {
        return $this->mereEpoux1;
    }

    public function setMereEpoux1(?Paroissiens $mereEpoux1): static
    {
        $this->mereEpoux1 = $mereEpoux1;

        return $this;
    }

    public function getPereEpoux2(): ?Paroissiens
    {
        return $this->pereEpoux2;
    }

    public function setPereEpoux2(?Paroissiens $pereEpoux2): static
    {
        $this->pereEpoux2 = $pereEpoux2;

        return $this;
    }

    public function getMereEpoux2(): ?Paroissiens
    {
        return $this->mereEpoux2;
    }

    public function setMereEpoux2(?Paroissiens $mereEpoux2): static
    {
        $this->mereEpoux2 = $mereEpoux2;

        return $this;
    }

    // Getters et setters pour les parents non paroissiens
    public function getPereEpoux1NonParoissien(): ?NonParoissiens
    {
        return $this->pereEpoux1NonParoissien;
    }

    public function setPereEpoux1NonParoissien(?NonParoissiens $pereEpoux1NonParoissien): static
    {
        $this->pereEpoux1NonParoissien = $pereEpoux1NonParoissien;

        return $this;
    }

    public function getMereEpoux1NonParoissien(): ?NonParoissiens
    {
        return $this->mereEpoux1NonParoissien;
    }

    public function setMereEpoux1NonParoissien(?NonParoissiens $mereEpoux1NonParoissien): static
    {
        $this->mereEpoux1NonParoissien = $mereEpoux1NonParoissien;

        return $this;
    }

    public function getPereEpoux2NonParoissien(): ?NonParoissiens
    {
        return $this->pereEpoux2NonParoissien;
    }

    public function setPereEpoux2NonParoissien(?NonParoissiens $pereEpoux2NonParoissien): static
    {
        $this->pereEpoux2NonParoissien = $pereEpoux2NonParoissien;

        return $this;
    }

    public function getMereEpoux2NonParoissien(): ?NonParoissiens
    {
        return $this->mereEpoux2NonParoissien;
    }

    public function setMereEpoux2NonParoissien(?NonParoissiens $mereEpoux2NonParoissien): static
    {
        $this->mereEpoux2NonParoissien = $mereEpoux2NonParoissien;

        return $this;
    }
}
