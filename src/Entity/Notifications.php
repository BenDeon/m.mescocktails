<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notifications
 *
 * @ORM\Table(name="notifications", indexes={@ORM\Index(name="barman", columns={"barman"})})
 * @ORM\Entity
 */
class Notifications
{
    /**
     * @var int
     *
     * @ORM\Column(name="idnotifications", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnotifications;

    /**
     * @var int
     *
     * @ORM\Column(name="barman", type="bigint", nullable=false)
     */
    private $barman;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateins", type="datetime", nullable=false)
     */
    private $dateins;

    public function getIdnotifications(): ?string
    {
        return $this->idnotifications;
    }

    public function getBarman(): ?string
    {
        return $this->barman;
    }

    public function setBarman(string $barman): self
    {
        $this->barman = $barman;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateins(): ?\DateTimeInterface
    {
        return $this->dateins;
    }

    public function setDateins(\DateTimeInterface $dateins): self
    {
        $this->dateins = $dateins;

        return $this;
    }


}
