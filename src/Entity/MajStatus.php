<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MajStatus
 *
 * @ORM\Table(name="maj_status", indexes={@ORM\Index(name="maj", columns={"maj", "barman"})})
 * @ORM\Entity
 */
class MajStatus
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
     * @ORM\Column(name="maj", type="bigint", nullable=false)
     */
    private $maj = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="barman", type="bigint", nullable=false)
     */
    private $barman = '0';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getMaj(): ?string
    {
        return $this->maj;
    }

    public function setMaj(string $maj): self
    {
        $this->maj = $maj;

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


}
