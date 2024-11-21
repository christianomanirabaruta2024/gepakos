<?php

namespace App\Entity;

use App\Repository\NonParoissiensRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\Genre;

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

    #[ORM\ManyToOne(targetEntity: Adresses::class)] // Relier à l'entité Adresse
    #[ORM\JoinColumn(name: 'id_adresse', referencedColumnName: 'id_adresse', nullable: false)]
    private ?Adresses $adresse = null;
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column(length: 30)]
    private ?string $lieu_naissance = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: 'string', enumType: Genre::class)] // Enum Type
    private ?Genre $genre = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $confession = null;

    // getteur et setteur de variables

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

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;
        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieu_naissance;
    }

    public function setLieuNaissance(string $lieu_naissance): static
    {
        $this->lieu_naissance = $lieu_naissance;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;
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

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(Genre $genre): static
    {
        $this->genre = $genre;
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
}
