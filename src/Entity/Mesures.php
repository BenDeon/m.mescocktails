<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesures
 *
 * @ORM\Table(name="mesures")
 * @ORM\Entity
 */
class Mesures
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mesure", type="string", length=255, nullable=false)
     */
    private $mesure;

    /**
     * @var float
     *
     * @ORM\Column(name="tocl", type="float", precision=10, scale=0, nullable=false)
     */
    private $tocl;

    public function getId(): ?bool
    {
        return $this->id;
    }

    public function getMesure(): ?string
    {
        return $this->mesure;
    }

    public function setMesure(string $mesure): self
    {
        $this->mesure = $mesure;

        return $this;
    }

    public function getTocl(): ?float
    {
        return $this->tocl;
    }

    public function setTocl(float $tocl): self
    {
        $this->tocl = $tocl;

        return $this;
    }


}
