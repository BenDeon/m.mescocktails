<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventsFetesSelection
 *
 * @ORM\Table(name="events_fetes_selection", indexes={@ORM\Index(name="event", columns={"event", "cocktail"})})
 * @ORM\Entity
 */
class EventsFetesSelection
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
     * @ORM\Column(name="event", type="bigint", nullable=false)
     */
    private $event;

    /**
     * @var int
     *
     * @ORM\Column(name="cocktail", type="bigint", nullable=false)
     */
    private $cocktail;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=false)
     */
    private $img;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function setEvent(string $event): self
    {
        $this->event = $event;

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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }


}
