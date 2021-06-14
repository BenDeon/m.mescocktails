<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CocktailsVues
 *
 * @ORM\Table(name="cocktails_vues", indexes={@ORM\Index(name="datelog", columns={"datelog"}), @ORM\Index(name="mois", columns={"cocktail"}), @ORM\Index(name="bot", columns={"bot"})})
 * @ORM\Entity
 */
class CocktailsVues
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
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
     * @var int
     *
     * @ORM\Column(name="vu", type="integer", nullable=false)
     */
    private $vu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datelog", type="date", nullable=false)
     */
    private $datelog;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="bot", type="boolean", nullable=true)
     */
    private $bot;

    public function getId(): ?int
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

    public function getVu(): ?int
    {
        return $this->vu;
    }

    public function setVu(int $vu): self
    {
        $this->vu = $vu;

        return $this;
    }

    public function getDatelog(): ?\DateTimeInterface
    {
        return $this->datelog;
    }

    public function setDatelog(\DateTimeInterface $datelog): self
    {
        $this->datelog = $datelog;

        return $this;
    }

    public function getBot(): ?bool
    {
        return $this->bot;
    }

    public function setBot(?bool $bot): self
    {
        $this->bot = $bot;

        return $this;
    }


}
