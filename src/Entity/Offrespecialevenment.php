<?php

namespace App\Entity; 


use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM; 
use App\Repository\OffrespecialevenmentRepository;
#[ORM\Entity(repositoryClass: OffrespecialevenmentRepository::class)]


/**
 * Offrespecialevenment
 *
 * @ORM\Table(name="offrespecialevenment")
 * @ORM\Entity
 */ 

class Offrespecialevenment
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'IdOffreSpecialEvenment', type: 'integer', nullable: false)]
    private int $idoffrespecialevenment;

    #[ORM\Column(name: 'titre', type: 'string', length: 255, nullable: false)]
    private string $titre;

    #[ORM\Column(name: 'description', type: 'text', length: 0, nullable: false)]
    private string $description;

    #[ORM\Column(name: 'date_depart', type: 'date', nullable: false)]
    private \DateTimeInterface $dateDepart;

    #[ORM\Column(name: 'prix', type: 'float', precision: 10, scale: 0, nullable: false)]
    private float $prix;

    #[ORM\Column(name: 'categorie', type: 'string', length: 255, nullable: false)]
    private string $categorie;

    #[ORM\Column(name: 'guide_id', type: 'string', length: 255, nullable: false)]
    private string $guideId;

    #[ORM\Column(name: 'destination', type: 'string', length: 255, nullable: false)]
    private string $destination;

    #[ORM\Column(name: 'image', type: 'string', length: 255, nullable: false)]
    private string $image;

    #[ORM\Column(name: 'niveau', type: 'string', length: 9, nullable: false)]
    private string $niveau;

    public function getIdoffrespecialevenment(): ?int
    {
        return $this->idoffrespecialevenment;
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

    public function getcategorie(): ?string
    {
        return $this->categorie;
    }

    public function setcategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getGuideId(): ?string
    {
        return $this->guideId;
    }

    public function setGuideId(string $guideId): static
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

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }
}
