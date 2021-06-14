<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccesLog
 *
 * @ORM\Table(name="acces_log", indexes={@ORM\Index(name="forwarded_for", columns={"forwarded_for"}), @ORM\Index(name="ip", columns={"remote_addr"})})
 * @ORM\Entity
 */
class AccesLog
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
     * @ORM\Column(name="remote_addr", type="string", length=50, nullable=false)
     */
    private $remoteAddr;

    /**
     * @var string
     *
     * @ORM\Column(name="forwarded_for", type="string", length=50, nullable=false)
     */
    private $forwardedFor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datel", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datel = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=false)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255, nullable=false)
     */
    private $pwd;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getRemoteAddr(): ?string
    {
        return $this->remoteAddr;
    }

    public function setRemoteAddr(string $remoteAddr): self
    {
        $this->remoteAddr = $remoteAddr;

        return $this;
    }

    public function getForwardedFor(): ?string
    {
        return $this->forwardedFor;
    }

    public function setForwardedFor(string $forwardedFor): self
    {
        $this->forwardedFor = $forwardedFor;

        return $this;
    }

    public function getDatel(): ?\DateTimeInterface
    {
        return $this->datel;
    }

    public function setDatel(\DateTimeInterface $datel): self
    {
        $this->datel = $datel;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
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
