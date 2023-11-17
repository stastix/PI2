<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM; 
use App\Repository\DemandeRepository;


#[ORM\Table(name: 'demande')]
#[ORM\Entity]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'idDemande', type: 'integer', nullable: false)]
    private int $iddemande;

    #[ORM\Column(name: 'Id', type: 'integer', nullable: false)]
    private int $id;

    #[ORM\Column(name: 'destination', type: 'string', length: 255, nullable: false)]
    private string $destination;

    #[ORM\Column(name: 'dateDepart', type: 'date', nullable: false)]
    private \DateTimeInterface $datedepart;

    #[ORM\Column(name: 'type', type: 'string', length: 255, nullable: false)]
    private string $type;

    public function getIddemande(): ?int
    {
        return $this->iddemande;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): static
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDatedepart(): ?\DateTimeInterface
    {
        return $this->datedepart;
    }

    public function setDatedepart(\DateTimeInterface $datedepart): static
    {
        $this->datedepart = $datedepart;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
