<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventsFocusCocktail
 *
 * @ORM\Table(name="events_focus_cocktail", indexes={@ORM\Index(name="actif", columns={"actif"}), @ORM\Index(name="cocktail", columns={"cocktail"}), @ORM\Index(name="select", columns={"selected"})})
 * @ORM\Entity
 */
class EventsFocusCocktail
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
    private $cocktail;

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=false)
     */
    private $descr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datef", type="date", nullable=false)
     */
    private $datef;

    /**
     * @var bool
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif;

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

    public function getCocktail(): ?string
    {
        return $this->cocktail;
    }

    public function setCocktail(string $cocktail): self
    {
        $this->cocktail = $cocktail;

        return $this;
    }

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): self
    {
        $this->descr = $descr;

        return $this;
    }

    public function getDatef(): ?\DateTimeInterface
    {
        return $this->datef;
    }

    public function setDatef(\DateTimeInterface $datef): self
    {
        $this->datef = $datef;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

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
