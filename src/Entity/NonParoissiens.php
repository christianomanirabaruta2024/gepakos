<?php

namespace App\Entity;

use App\Repository\NonParoissiensRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonParoissiensRepository::class)]
class NonParoissiens
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_non_paroissien = null;


    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $confession = null;


    #[ORM\ManyToOne(targetEntity: Adresses::class)] // Relier à l'entité Adresse
    #[ORM\JoinColumn(name: 'id_adresse', referencedColumnName: 'id_adresse', nullable: false)]
    private ?Adresses $adresse = null;

    public function getIdNonParoissien(): ?string
    {
        return $this->id_non_paroissien;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getConfession(): ?string
    {
        return $this->confession;
    }

    public function setConfession(?string $confession): static
    {
        $this->confession = $confession;

        return $this;
    }

    public function getAdresse(): ?Adresses
    {
        return $this->adresse;
    }

    public function setAdresse(Adresses $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

}
