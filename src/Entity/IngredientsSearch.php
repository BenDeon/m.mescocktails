<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IngredientsSearch
 *
 * @ORM\Table(name="ingredients_search", indexes={@ORM\Index(name="mois", columns={"mois", "annee", "ingredient"})})
 * @ORM\Entity
 */
class IngredientsSearch
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
     * @var bool
     *
     * @ORM\Column(name="mois", type="boolean", nullable=false)
     */
    private $mois;

    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="smallint", nullable=false)
     */
    private $annee;

    /**
     * @var int
     *
     * @ORM\Column(name="ingredient", type="bigint", nullable=false)
     */
    private $ingredient;

    /**
     * @var int
     *
     * @ORM\Column(name="compte", type="smallint", nullable=false)
     */
    private $compte;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getMois(): ?bool
    {
        return $this->mois;
    }

    public function setMois(bool $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getCompte(): ?int
    {
        return $this->compte;
    }

    public function setCompte(int $compte): self
    {
        $this->compte = $compte;

        return $this;
    }


}
