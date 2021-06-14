<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires", indexes={@ORM\Index(name="abus", columns={"abus"}), @ORM\Index(name="cocktail", columns={"cocktail"}), @ORM\Index(name="suppr", columns={"suppr"})})
 * @ORM\Entity
 */
class Commentaires
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
     * @var int
     *
     * @ORM\Column(name="barman", type="bigint", nullable=false)
     */
    private $barman;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateins", type="datetime", nullable=false)
     */
    private $dateins;

    /**
     * @var bool
     *
     * @ORM\Column(name="abus", type="boolean", nullable=false)
     */
    private $abus = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="suppr", type="boolean", nullable=false)
     */
    private $suppr = '0';

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

    public function getBarman(): ?string
    {
        return $this->barman;
    }

    public function setBarman(string $barman): self
    {
        $this->barman = $barman;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

    public function getAbus(): ?bool
    {
        return $this->abus;
    }

    public function setAbus(bool $abus): self
    {
        $this->abus = $abus;

        return $this;
    }

    public function getSuppr(): ?bool
    {
        return $this->suppr;
    }

    public function setSuppr(bool $suppr): self
    {
        $this->suppr = $suppr;

        return $this;
    }


}
