<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cockingr
 *
 * @ORM\Table(name="cockingr", indexes={@ORM\Index(name="cocktail", columns={"cocktail", "ingredient"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CockingrRepository")
 */
class Cockingr
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
     * @ORM\Column(name="cocktail", type="bigint", nullable=false)
     */
    private $cocktail = '0';


    /**
     * @var int
     *
     * @ORM\Column(name="ingredient", type="bigint", nullable=false)
     */
    private $ingredient = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="quantite", type="float", precision=10, scale=0, nullable=false)
     */
    private $quantite = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCocktail(): ?int
    {
        return $this->cocktail;
    }

    public function setCocktail(int $cocktail): self
    {
        $this->cocktail = $cocktail;

        return $this;
    }

    public function getIngredient(): ?int
    {
        return $this->ingredient;
    }

    public function setIngredient(int $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(bool $type): self
    {
        $this->type = $type;

        return $this;
    }


}
