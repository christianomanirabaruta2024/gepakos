<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_status = null; // Utilisation de id_status comme clé primaire

    #[ORM\ManyToOne(targetEntity: Paroissiens::class)]
    #[ORM\JoinColumn(name: 'id_paroissien', referencedColumnName: 'id_paroissien', nullable: false)]
    private ?Paroissiens $paroissien = null; // Clé étrangère vers Paroissiens

    #[ORM\Column(length: 50)]
    private ?string $paroisse = null;

    #[ORM\Column(length: 20)]
    private ?string $colline = null;

    #[ORM\ManyToOne(targetEntity: Adresse::class)]
    #[ORM\JoinColumn(name: 'id_adresse', referencedColumnName: 'id_adresse', nullable: false)]
    private ?Adresse $adresse = null; // Clé étrangère vers Adresse

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $conditio = null;

    #[ORM\ManyToOne(targetEntity: Bapteme::class)]
    #[ORM\JoinColumn(name: 'id_bapteme', referencedColumnName: 'id_bapteme', nullable: true)]
    private ?Bapteme $bapteme = null; // Clé étrangère vers Bapteme

    #[ORM\ManyToOne(targetEntity: Communion::class)]
    #[ORM\JoinColumn(name: 'id_communion', referencedColumnName: 'id_communion', nullable: true)]
    private ?Communion $communion = null; // Clé étrangère vers Communion

    #[ORM\ManyToOne(targetEntity: Confirmation::class)]
    #[ORM\JoinColumn(name: 'id_confirmation', referencedColumnName: 'id_confirmation', nullable: true)]
    private ?Confirmation $confirmation = null; // Clé étrangère vers Confirmation

    #[ORM\ManyToOne(targetEntity: Mariage::class)]
    #[ORM\JoinColumn(name: 'id_mariage', referencedColumnName: 'id_mariage', nullable: true)]
    private ?Mariage $mariage = null; // Clé étrangère vers Mariage

    #[ORM\ManyToOne(targetEntity: Defunt::class)]
    #[ORM\JoinColumn(name: 'id_defunt', referencedColumnName: 'id_defunt', nullable: true)]
    private ?Defunt $defunt = null; // Clé étrangère vers Defunt

    public function getIdStatus(): ?string
    {
        return $this->id_status;
    }

    public function setIdStatus(string $id_status): static
    {
        $this->id_status = $id_status;

        return $this;
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

    public function getParoisse(): ?string
    {
        return $this->paroisse;
    }

    public function setParoisse(string $paroisse): static
    {
        $this->paroisse = $paroisse;

        return $this;
    }

    public function getColline(): ?string
    {
        return $this->colline;
    }

    public function setColline(string $colline): static
    {
        $this->colline = $colline;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getConditio(): ?string
    {
        return $this->conditio;
    }

    public function setConditio(?string $conditio): static
    {
        $this->conditio = $conditio;

        return $this;
    }

    public function getBapteme(): ?Bapteme
    {
        return $this->bapteme;
    }

    public function setBapteme(?Bapteme $bapteme): static
    {
        $this->bapteme = $bapteme;

        return $this;
    }

    public function getCommunion(): ?Communion
    {
        return $this->communion;
    }

    public function setCommunion(?Communion $communion): static
    {
        $this->communion = $communion;

        return $this;
    }

    public function getConfirmation(): ?Confirmation
    {
        return $this->confirmation;
    }

    public function setConfirmation(?Confirmation $confirmation): static
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    public function getMariage(): ?Mariage
    {
        return $this->mariage;
    }

    public function setMariage(?Mariage $mariage): static
    {
        $this->mariage = $mariage;

        return $this;
    }

    public function getDefunt(): ?Defunt
    {
        return $this->defunt;
    }

    public function setDefunt(?Defunt $defunt): static
    {
        $this->defunt = $defunt;

        return $this;
    }
}
