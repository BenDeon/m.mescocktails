<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BarmansConfig
 *
 * @ORM\Table(name="barmans_config", indexes={@ORM\Index(name="profil", columns={"profil"}), @ORM\Index(name="barman", columns={"barman"})})
 * @ORM\Entity
 */
class BarmansConfig
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
     * @var bool
     *
     * @ORM\Column(name="mesure", type="boolean", nullable=false)
     */
    private $mesure = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="contdose", type="boolean", nullable=false, options={"default"="2"})
     */
    private $contdose = '2';

    /**
     * @var bool
     *
     * @ORM\Column(name="contdosemes", type="boolean", nullable=false)
     */
    private $contdosemes = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="profil", type="boolean", nullable=false, options={"default"="1"})
     */
    private $profil = true;

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

    public function getMesure(): ?bool
    {
        return $this->mesure;
    }

    public function setMesure(bool $mesure): self
    {
        $this->mesure = $mesure;

        return $this;
    }

    public function getContdose(): ?bool
    {
        return $this->contdose;
    }

    public function setContdose(bool $contdose): self
    {
        $this->contdose = $contdose;

        return $this;
    }

    public function getContdosemes(): ?bool
    {
        return $this->contdosemes;
    }

    public function setContdosemes(bool $contdosemes): self
    {
        $this->contdosemes = $contdosemes;

        return $this;
    }

    public function getProfil(): ?bool
    {
        return $this->profil;
    }

    public function setProfil(bool $profil): self
    {
        $this->profil = $profil;

        return $this;
    }


}
