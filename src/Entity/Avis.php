<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM; 
use App\Repository\AvisRepository;


#[ORM\Table(name: 'avis')]
#[ORM\Entity]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'idAvis', type: 'integer', nullable: false)]
    private int $idavis;

    #[ORM\Column(name: 'auteur', type: 'string', length: 255, nullable: false)]
    private string $auteur;

    #[ORM\Column(name: 'note', type: 'string', length: 255, nullable: false)]
    private string $note;

    #[ORM\Column(name: 'contenu', type: 'string', length: 100, nullable: false)]
    private string $contenu;

    public function getIdavis(): ?int
    {
        return $this->idavis;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;

        return $this;
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
}
