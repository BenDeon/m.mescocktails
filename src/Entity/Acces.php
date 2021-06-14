<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acces
 *
 * @ORM\Table(name="acces")
 * @ORM\Entity
 */
class Acces
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = '';

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255, nullable=false)
     */
    private $pwd = '';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }


}
