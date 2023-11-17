<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM; 
use App\Repository\EvenementRepository;


#[ORM\Table(name: 'evenement')]
#[ORM\Entity]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'IdEvennement', type: 'integer', nullable: false)]
    private int $idevennement;

    #[ORM\Column(name: 'titre', type: 'string', length: 255, nullable: false)]
    private string $titre;

    #[ORM\Column(name: 'description', type: 'string', length: 255, nullable: false)]
    private string $description;

    #[ORM\Column(name: 'date_depart', type: 'date', nullable: false)]
    private \DateTimeInterface $dateDepart;

    #[ORM\Column(name: 'prix', type: 'integer', nullable: false)]
    private int $prix;

    #[ORM\Column(name: 'TypeEvennement', type: 'string', length: 55, nullable: false)]
    private string $typeevennement;

    #[ORM\Column(name: 'guide_id', type: 'integer', nullable: false)]
    private int $guideId;

    #[ORM\Column(name: 'destination', type: 'string', length: 255, nullable: false)]
    private string $destination;

    #[ORM\Column(name: 'image', type: 'string', length: 255, nullable: false)]
    private string $image;

    #[ORM\Column(name: 'SponsorEvenement', type: 'string', length: 255, nullable: false)]
    private string $sponsorevenement;

    public function getIdevennement(): ?int
    {
        return $this->idevennement;
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTypeevennement(): ?string
    {
        return $this->typeevennement;
    }

    public function setTypeevennement(string $typeevennement): static
    {
        $this->typeevennement = $typeevennement;

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
