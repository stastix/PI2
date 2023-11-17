<?php

namespace App\Entity; 
use App\Repository\CommantaireRepository;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'commantaire')]
#[ORM\Entity]
class Commantaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'IdCommentaire', type: 'integer', nullable: false)]
    private int $idcommentaire;

    #[ORM\Column(name: 'contenu', type: 'string', length: 255, nullable: false)]
    private string $contenu;

    #[ORM\Column(name: 'IdEvennement', type: 'integer', nullable: false)]
    private int $idevennement;

    public function getIdcommentaire(): ?int
    {
        return $this->idcommentaire;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getIdevennement(): ?int
    {
        return $this->idevennement;
    }

    public function setIdevennement(int $idevennement): static
    {
        $this->idevennement = $idevennement;

        return $this;
    }
}
