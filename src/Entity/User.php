<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM; 
use App\Repository\UserRepository;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity 
 * 
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]

class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    private int $id;

    #[ORM\Column(name: 'nom', type: 'text', length: 65535, nullable: false)]
    private string $nom;

    #[ORM\Column(name: 'prenom', type: 'text', length: 65535, nullable: false)]
    private string $prenom;

    #[ORM\Column(name: 'email', type: 'text', length: 65535, nullable: false)]
    private string $email;

    #[ORM\Column(name: 'motDePasse', type: 'text', length: 65535, nullable: false)]
    private string $motdepasse;

    #[ORM\Column(name: 'numeroTelephone', type: 'text', length: 65535, nullable: false)]
    private string $numerotelephone;

    #[ORM\Column(name: 'dateNaissance', type: 'text', length: 65535, nullable: false)]
    private string $datenaissance;

    #[ORM\Column(name: 'genre', type: 'text', length: 65535, nullable: false)]
    private string $genre;

    #[ORM\Column(name: 'Role', type: 'string', length: 20, nullable: false, options: ["default" => "CLIENT"])]
    private string $role = 'CLIENT';

    #[ORM\Column(name: 'cartefidelite_id', type: 'integer', nullable: true)]
    private ?int $cartefideliteId;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Cartefidelite $cartefidelite = null; 
    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): static
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getNumerotelephone(): ?string
    {
        return $this->numerotelephone;
    }

    public function setNumerotelephone(string $numerotelephone): static
    {
        $this->numerotelephone = $numerotelephone;

        return $this;
    }

    public function getDatenaissance(): ?string
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(string $datenaissance): static
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getCartefideliteId(): ?int
    {
        return $this->cartefideliteId;
    }

    public function setCartefideliteId(?int $cartefideliteId): static
    {
        $this->cartefideliteId = $cartefideliteId;

        return $this;
    }

    public function getCartefidelite(): ?Cartefidelite
    {
        return $this->cartefidelite;
    }

    public function setCartefidelite(?Cartefidelite $cartefidelite): static
    {
        // unset the owning side of the relation if necessary
        if ($cartefidelite === null && $this->cartefidelite !== null) {
            $this->cartefidelite->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($cartefidelite !== null && $cartefidelite->getUser() !== $this) {
            $cartefidelite->setUser($this);
        }

        $this->cartefidelite = $cartefidelite;

        return $this;
    }
}
