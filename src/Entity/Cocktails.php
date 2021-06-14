<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Cocktails
 *
 * @ORM\Table(name="cocktails", indexes={
 *    @ORM\Index(name="actif", columns={"actif"}),
 *    @ORM\Index(name="typec", columns={"typec"}),
 *    @ORM\Index(name="proposal", columns={"proposal"}),
 *    @ORM\Index(name="variante", columns={"variante"}),
 *    @ORM\Index(name="liaison", columns={"liaison"})
 * })
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CocktailsRepository")
 */
class Cocktails
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
     * @ORM\Column(name="proposal", type="boolean", nullable=true)
     */
    private $proposal;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="refus", type="boolean", nullable=true)
     */
    private $refus;

    /**
     * @var string
     *
     * @ORM\Column(name="typec", type="string", length=0, nullable=false)
     */
    private $typec;

    /**
     * @var int
     *
     * @ORM\Column(name="variante", type="bigint", nullable=false)
     */
    private $variante;

    /**
     * @ORM\OneToOne(targetEntity="CocktailsDetails", mappedBy="cocktail", cascade={"persist", "remove"})
     */
    private $details;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Ingredients", inversedBy="cocktails", cascade={"persist"})
     * @ORM\JoinTable(name="Cockingr",
     *  joinColumns={@ORM\JoinColumn(name="cocktail", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="ingredient", referencedColumnName="id", unique=true)}
     * )
     */
    private $ingredients;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

    public function getDetails(): CocktailsDetails
    {
      return $this->details;
    }

    public function setDetails(CocktailsDetails $details):self
    {
      $this->details = $details;
      return $this;
    }

    /**
     * @return Collection|Ingredients[]
     */
    public function getIngredients(): Collection
    {
      return $this->ingredients;
    }

    public function setIngredients(Cockingr $ingredients):self
    {
      $this->ingredients = $ingredients;
      return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
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

    public function getProposal(): ?bool
    {
        return $this->proposal;
    }

    public function setProposal(?bool $proposal): self
    {
        $this->proposal = $proposal;

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

    public function getRefus(): ?bool
    {
        return $this->refus;
    }

    public function setRefus(?bool $refus): self
    {
        $this->refus = $refus;

        return $this;
    }

    public function getTypec(): ?string
    {
        return $this->typec;
    }

    public function setTypec(string $typec): self
    {
        $this->typec = $typec;

        return $this;
    }

    public function getVariante(): ?string
    {
        return $this->variante;
    }

    public function setVariante(string $variante): self
    {
        $this->variante = $variante;

        return $this;
    }


}
