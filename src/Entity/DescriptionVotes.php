<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionVotes
 *
 * @ORM\Table(name="description_votes", indexes={@ORM\Index(name="barman", columns={"barman", "cocktail"}), @ORM\Index(name="idMot", columns={"idMot"})})
 * @ORM\Entity
 */
class DescriptionVotes
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
     * @ORM\Column(name="idMot", type="integer", nullable=false)
     */
    private $idmot;

    /**
     * @var int
     *
     * @ORM\Column(name="barman", type="bigint", nullable=false)
     */
    private $barman;

    /**
     * @var int
     *
     * @ORM\Column(name="cocktail", type="bigint", nullable=false)
     */
    private $cocktail;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getIdmot(): ?int
    {
        return $this->idmot;
    }

    public function setIdmot(int $idmot): self
    {
        $this->idmot = $idmot;

        return $this;
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

    public function getCocktail(): ?string
    {
        return $this->cocktail;
    }

    public function setCocktail(string $cocktail): self
    {
        $this->cocktail = $cocktail;

        return $this;
    }


}
