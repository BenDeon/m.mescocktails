<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredients
 *
 * @ORM\Table(name="ingredients", indexes={@ORM\Index(name="liaison", columns={"liaison", "actif"}), @ORM\Index(name="dateins", columns={"dateins"}), @ORM\Index(name="type", columns={"type"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\IngredientsRepository")
 */
class Ingredients
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
     * @ORM\Column(name="type", type="bigint", nullable=false)
     */
    private $type = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="liaison", type="bigint", nullable=true)
     */
    private $liaison;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateins", type="datetime", nullable=true)
     */
    private $dateins;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Cocktails", mappedBy="ingredients", cascade={"persist"})
     * @ORM\JoinTable(name="Cockingr",
     *  joinColumns={@ORM\JoinColumn(name="ingredient", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="cocktail", referencedColumnName="id", unique=true)}
     * )
     */
    private $cocktails;

    public function __construct()
    {
        $this->cocktails = new ArrayCollection();
    }

    /**
     * @return Collection|Cocktails[]
     */
    public function getCocktails(): collection
    {
      return $this->cocktails;
    }

    public function setCocktails(Cockingr $cocktails):self
    {
      $this->cocktails = $cocktails;
      return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLiaison(): ?string
    {
        return $this->liaison;
    }

    public function setLiaison(?string $liaison): self
    {
        $this->liaison = $liaison;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(?bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getDateins(): ?\DateTimeInterface
    {
        return $this->dateins;
    }

    public function setDateins(?\DateTimeInterface $dateins): self
    {
        $this->dateins = $dateins;

        return $this;
    }


}
