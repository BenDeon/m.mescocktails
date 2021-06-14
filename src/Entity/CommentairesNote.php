<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentairesNote
 *
 * @ORM\Table(name="commentaires_note", indexes={@ORM\Index(name="commentaire", columns={"commentaire", "barman"})})
 * @ORM\Entity
 */
class CommentairesNote
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
     * @ORM\Column(name="commentaire", type="bigint", nullable=false)
     */
    private $commentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="barman", type="bigint", nullable=false)
     */
    private $barman;

    /**
     * @var bool
     *
     * @ORM\Column(name="plus", type="boolean", nullable=false)
     */
    private $plus = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="moins", type="boolean", nullable=false)
     */
    private $moins = '0';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

    public function getPlus(): ?bool
    {
        return $this->plus;
    }

    public function setPlus(bool $plus): self
    {
        $this->plus = $plus;

        return $this;
    }

    public function getMoins(): ?bool
    {
        return $this->moins;
    }

    public function setMoins(bool $moins): self
    {
        $this->moins = $moins;

        return $this;
    }


}
