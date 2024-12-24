<?php

namespace App\Entity;

use App\Repository\PersonnelsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PersonnelsRepository::class)]
class Personnels
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    private ?string $id_personnel = null; // Utilisé comme clé primaire

    #[ORM\ManyToOne(targetEntity: Baptemes::class)] // Relier à l'entité Baptemes
    #[ORM\JoinColumn(name: 'id_bapteme', referencedColumnName: 'id_bapteme', nullable: false)]
    private ?Baptemes $bapteme = null;

    #[ORM\ManyToOne(targetEntity: NonParoissiens::class)] // Relation avec l'entité Paroissiens
    #[ORM\JoinColumn(name: 'id_non_paroissien', referencedColumnName: 'id_non_paroissien', nullable: true)] // L'id_paroissien est une clé étrangère
    private ?NonParoissiens $id_non_paroissien = null;


    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\Choice(
        choices: ['prêtre', 'diacre', 'séminariste', 'catéchiste', 'bénévole', 'cuisinier', 'laveur', 'sentinelle', 'travailleur'],
        message: 'Choisissez un titre valide parmi les options.'
    )]
    private ?string $titres = null; // Poste ou titre dans la paroisse

    public function getIdPersonnel(): ?string
    {
        return $this->id_personnel;
    }

    public function setIdPersonnel(string $id_personnel): static
    {
        $this->id_personnel = $id_personnel;
        return $this;
    }

    public function getBapteme(): ?Baptemes
    {
        return $this->bapteme;
    }

    public function setBaptemes(?Baptemes $bapteme): static
    {
        $this->bapteme = $bapteme;

        return $this;
    }


    public function getIdNonParoissien(): ?NonParoissiens
    {
        return $this->id_non_paroissien;
    }

    public function setIdNonParoissien(?NonParoissiens $id_non_paroissien): static
    {
        $this->id_non_paroissien = $id_non_paroissien;
        return $this;
    }

    public function getTitres(): ?string
    {
        return $this->titres;
    }

    public function setTitres(string $titres): static
    {
        $this->titres = $titres;
        return $this;
    }
}
