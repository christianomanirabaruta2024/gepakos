<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity]
class Adresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?int $id_adresse = null;

    #[ORM\Column(length: 10)] // Taille plus réaliste pour le numéro de rue
    private ?string $numero_rue = null;

    #[ORM\Column(length: 25)] // Nom de rue jusqu'à 25 caractères
    private ?string $nom_rue = null;

    #[ORM\Column(length: 30)] // Ville jusqu'à 30 caractères
    private ?string $ville = null;

    #[ORM\Column(length: 20)] // Code postal jusqu'à 20 caractères (permet de gérer les codes postaux longs comme ceux de certains pays)
    private ?string $code_postal = null;

    #[ORM\Column(length: 25)] // Pays jusqu'à 25 caractères
    private ?string $pays = null;

    // Getters et setters pour chaque attribut

    public function getIdAdresse(): ?int
    {
        return $this->id_adresse;
    }

    public function getNumeroRue(): ?string
    {
        return $this->numero_rue;
    }

    public function setNumeroRue(string $numero_rue): static
    {
        $this->numero_rue = $numero_rue;
        return $this;
    }

    public function getNomRue(): ?string
    {
        return $this->nom_rue;
    }

    public function setNomRue(string $nom_rue): static
    {
        $this->nom_rue = $nom_rue;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;
        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;
        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;
        return $this;
    }
}
