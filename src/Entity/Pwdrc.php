<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pwdrc
 *
 * @ORM\Table(name="pwdrc", indexes={@ORM\Index(name="hash", columns={"hash"})})
 * @ORM\Entity
 */
class Pwdrc
{
    /**
     * @var int
     *
     * @ORM\Column(name="barman", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $barman = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255, nullable=false)
     */
    private $hash = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateins", type="date", nullable=false, options={"default"="0000-00-00"})
     */
    private $dateins = '0000-00-00';

    public function getBarman(): ?string
    {
        return $this->barman;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

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


}
