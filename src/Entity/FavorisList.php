<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavorisList
 *
 * @ORM\Table(name="favoris_list", indexes={@ORM\Index(name="barman", columns={"barman"})})
 * @ORM\Entity
 */
class FavorisList
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="barman", type="bigint", nullable=false)
     */
    private $barman = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom = '';

    public function getId(): ?string
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


}
