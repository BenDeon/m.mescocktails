<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BarmansInfos
 *
 * @ORM\Table(name="barmans_infos", indexes={@ORM\Index(name="barman", columns={"barman"})})
 * @ORM\Entity
 */
class BarmansInfos
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
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="pays", type="bigint", nullable=false)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=0, nullable=false)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar_src", type="string", length=255, nullable=false)
     */
    private $avatarSrc;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getAvatarSrc(): ?string
    {
        return $this->avatarSrc;
    }

    public function setAvatarSrc(string $avatarSrc): self
    {
        $this->avatarSrc = $avatarSrc;

        return $this;
    }


}
