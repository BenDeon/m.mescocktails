<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionMots
 *
 * @ORM\Table(name="description_mots")
 * @ORM\Entity
 */
class DescriptionMots
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMot", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmot;

    /**
     * @var string
     *
     * @ORM\Column(name="mot", type="string", length=255, nullable=false)
     */
    private $mot;

    public function getIdmot(): ?int
    {
        return $this->idmot;
    }

    public function getMot(): ?string
    {
        return $this->mot;
    }

    public function setMot(string $mot): self
    {
        $this->mot = $mot;

        return $this;
    }


}
