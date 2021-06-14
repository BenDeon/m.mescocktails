<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Baringr
 *
 * @ORM\Table(name="baringr", indexes={@ORM\Index(name="barman", columns={"barman", "ingredient"})})
 * @ORM\Entity
 */
class Baringr
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
     * @var int
     *
     * @ORM\Column(name="ingredient", type="bigint", nullable=false)
     */
    private $ingredient = '0';

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

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }


}
