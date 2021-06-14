<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogShareCocktails
 *
 * @ORM\Table(name="log_share_cocktails", indexes={@ORM\Index(name="barman", columns={"barman", "cocktail"})})
 * @ORM\Entity
 */
class LogShareCocktails
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
    private $barman;

    /**
     * @var int
     *
     * @ORM\Column(name="cocktail", type="bigint", nullable=false)
     */
    private $cocktail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateins", type="datetime", nullable=false)
     */
    private $dateins;

    /**
     * @var string
     *
     * @ORM\Column(name="destinataire", type="string", length=255, nullable=false)
     */
    private $destinataire;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;

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

    public function getCocktail(): ?string
    {
        return $this->cocktail;
    }

    public function setCocktail(string $cocktail): self
    {
        $this->cocktail = $cocktail;

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

    public function getDestinataire(): ?string
    {
        return $this->destinataire;
    }

    public function setDestinataire(string $destinataire): self
    {
        $this->destinataire = $destinataire;

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


}
