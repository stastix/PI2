<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM; 
use App\Repository\CartefideliteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[ORM\Table(name: 'cartefidelite')]
#[ORM\Entity(repositoryClass: CartefideliteRepository::class)] 
/**
 * @Route("/cartefidelite/index/{id}", name="cartefidelite_index")
 * @ParamConverter("cartefidelite", class="App\Entity\Cartefidelite", options={"id" = "id"})
 */


class Cartefidelite 
{   



    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'IdCarte', type: 'integer', nullable: false)]
    private int $idcarte;

    #[ORM\Column(name: 'PtsFidelite', type: 'integer', nullable: false)]
    private int $ptsfidelite;

    #[ORM\Column(name: 'DateDebut', type: 'date', nullable: false)]
    private \DateTimeInterface $datedebut;

    #[ORM\Column(name: 'DateFin', type: 'date', nullable: false)]
    private \DateTimeInterface $datefin;

    #[ORM\Column(name: 'EtatCarte', type: 'string', length: 9, nullable: false)]
    private string $etatcarte;

    #[ORM\Column(name: 'NiveauCarte', type: 'string', length: 9, nullable: false)]
    private string $niveaucarte;

    #[ORM\OneToOne(inversedBy: 'cartefidelite', cascade: ['persist'])]
    private ?User $user = null;

    public function getIdcarte(): ?int
    {
        return $this->idcarte;
    }

    public function getPtsfidelite(): ?int
    {
        return $this->ptsfidelite;
    }

    public function setPtsfidelite(int $ptsfidelite): static
    {
        $this->ptsfidelite = $ptsfidelite;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): static
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): static
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getEtatcarte(): ?string
    {
        return $this->etatcarte;
    }

    public function setEtatcarte(string $etatcarte): static
    {
        $this->etatcarte = $etatcarte;

        return $this;
    }

    public function getNiveaucarte(): ?string
    {
        return $this->niveaucarte;
    }

    public function setNiveaucarte(string $niveaucarte): static
    {
        $this->niveaucarte = $niveaucarte;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $User): static
    {
        $this->user = $User;

        return $this;
    }
}
