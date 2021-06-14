<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventsIngredient
 *
 * @ORM\Table(name="events_ingredient", indexes={@ORM\Index(name="ingredient", columns={"ingredient", "mois"})})
 * @ORM\Entity
 */
class EventsIngredient
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
     * @ORM\Column(name="ingredient", type="bigint", nullable=false)
     */
    private $ingredient;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="mois", type="integer", nullable=false)
     */
    private $mois;

    /**
     * @var bool
     *
     * @ORM\Column(name="selected", type="boolean", nullable=false)
     */
    private $selected;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getMois(): ?int
    {
        return $this->mois;
    }

    public function setMois(int $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getSelected(): ?bool
    {
        return $this->selected;
    }

    public function setSelected(bool $selected): self
    {
        $this->selected = $selected;

        return $this;
    }


}
