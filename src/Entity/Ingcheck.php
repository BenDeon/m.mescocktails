<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingcheck
 *
 * @ORM\Table(name="ingcheck", indexes={@ORM\Index(name="barman", columns={"barman"})})
 * @ORM\Entity
 */
class Ingcheck
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
    private $barman = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastcon", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $lastcon = '0000-00-00 00:00:00';

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

    public function getLastcon(): ?\DateTimeInterface
    {
        return $this->lastcon;
    }

    public function setLastcon(\DateTimeInterface $lastcon): self
    {
        $this->lastcon = $lastcon;

        return $this;
    }


}
