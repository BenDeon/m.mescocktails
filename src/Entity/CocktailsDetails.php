<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CocktailsDetails
 *
 * @ORM\Table(name="cocktails_details", indexes={
 *    @ORM\Index(name="origine", columns={"origine"}),
 *    @ORM\Index(name="cocktail", columns={"cocktail"})
 * })
 * @ORM\Entity
 */
class CocktailsDetails
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
     * @ORM\OneToOne(targetEntity="Cocktails", inversedBy="details", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="cocktail", referencedColumnName="id", nullable=false)
     */
    private $cocktail = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="text", length=0, nullable=false)
     */
    private $detail;

    /**
     * @var string
     *
     * @ORM\Column(name="accroche", type="text", length=65535, nullable=false)
     */
    private $accroche;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=false)
     */
    private $img;

    /**
     * @var int
     *
     * @ORM\Column(name="methode", type="integer", nullable=false)
     */
    private $methode;

    /**
     * @var bool
     *
     * @ORM\Column(name="glace", type="boolean", nullable=false)
     */
    private $glace;

    /**
     * @var int
     *
     * @ORM\Column(name="verre", type="integer", nullable=false)
     */
    private $verre;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=2, nullable=false)
     */
    private $origine;


    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCocktail(): Cocktails
    {
        return $this->cocktail;
    }

    public function setCocktail(Cocktails $cocktail): self
    {
        $this->cocktail = $cocktail;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getAccroche(): ?string
    {
        return $this->accroche;
    }

    public function setAccroche(string $accroche): self
    {
        $this->accroche = $accroche;

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

    public function getMethode(): ?int
    {
        return $this->methode;
    }

    public function setMethode(int $methode): self
    {
        $this->methode = $methode;

        return $this;
    }

    public function getGlace(): ?bool
    {
        return $this->glace;
    }

    public function setGlace(bool $glace): self
    {
        $this->glace = $glace;

        return $this;
    }

    public function getVerre(): ?int
    {
        return $this->verre;
    }

    public function setVerre(int $verre): self
    {
        $this->verre = $verre;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }


}
