<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventsFetes
 *
 * @ORM\Table(name="events_fetes", indexes={@ORM\Index(name="actif", columns={"actif"}), @ORM\Index(name="dated", columns={"dated", "datef"})})
 * @ORM\Entity
 */
class EventsFetes
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="dated", type="string", length=5, nullable=false)
     */
    private $dated;

    /**
     * @var string
     *
     * @ORM\Column(name="datef", type="string", length=5, nullable=false)
     */
    private $datef;

    /**
     * @var bool
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getDated(): ?string
    {
        return $this->dated;
    }

    public function setDated(string $dated): self
    {
        $this->dated = $dated;

        return $this;
    }

    public function getDatef(): ?string
    {
        return $this->datef;
    }

    public function setDatef(string $datef): self
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


}
