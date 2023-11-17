<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM; 
use App\Repository\EvenementsRepository;


#[ORM\Table(name: 'evenements')]
#[ORM\Entity]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'IdEvenement', type: 'integer', nullable: false)]
    private int $idevenement;

    #[ORM\Column(name: 'titre', type: 'string', length: 255, nullable: false)]
    private string $titre;

    #[ORM\Column(name: 'description', type: 'string', length: 255, nullable: false)]
    private string $description;

    #[ORM\Column(name: 'date_depart', type: 'date', nullable: false)]
    private \DateTimeInterface $dateDepart;

    #[ORM\Column(name: 'prix', type: 'float', precision: 10, scale: 0, nullable: false)]
    private float $prix;

    #[ORM\Column(name: 'TypeEvenement', type: 'string', length: 255, nullable: false)]
    private string $typeevenement;

    #[ORM\Column(name: 'guide_id', type: 'integer', nullable: false)]
    private int $guideId;

    #[ORM\Column(name: 'destination', type: 'string', length: 255, nullable: false)]
    private string $destination;

    #[ORM\Column(name: 'image', type: 'string', length: 255, nullable: false)]
    private string $image;

    #[ORM\Column(name: 'SponsorEvenement', type: 'string', length: 255, nullable: false)]
    private string $sponsorevenement;

    public function getIdevenement(): ?int
    {
        return $this->idevenement;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): static
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTypeevenement(): ?string
    {
        return $this->typeevenement;
    }

    public function setTypeevenement(string $typeevenement): static
    {
        $this->typeevenement = $typeevenement;

        return $this;
    }

    public function getGuideId(): ?int
    {
        return $this->guideId;
    }

    public function setGuideId(int $guideId): static
    {
        $this->guideId = $guideId;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getSponsorevenement(): ?string
    {
        return $this->sponsorevenement;
    }

    public function setSponsorevenement(string $sponsorevenement): static
    {
        $this->sponsorevenement = $sponsorevenement;

        return $this;
    }
}
