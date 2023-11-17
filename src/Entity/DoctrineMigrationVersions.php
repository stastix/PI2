<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'doctrine_migration_versions')]
#[ORM\Entity]
class DoctrineMigrationVersions
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'version', type: 'string', length: 191, nullable: false)]
    private string $version;

    #[ORM\Column(name: 'executed_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $executedAt;

    #[ORM\Column(name: 'execution_time', type: 'integer', nullable: true)]
    private ?int $executionTime;

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function getExecutedAt(): ?\DateTimeInterface
    {
        return $this->executedAt;
    }

    public function setExecutedAt(?\DateTimeInterface $executedAt): static
    {
        $this->executedAt = $executedAt;

        return $this;
    }

    public function getExecutionTime(): ?int
    {
        return $this->executionTime;
    }

    public function setExecutionTime(?int $executionTime): static
    {
        $this->executionTime = $executionTime;

        return $this;
    }
}
