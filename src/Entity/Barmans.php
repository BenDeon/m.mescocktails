<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Barmans
 *
 * @ORM\Table(name="barmans")
 * @ORM\Entity
 */
class Barmans
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
     * @ORM\Column(name="pseudo", type="string", length=255, nullable=false)
     */
    private $pseudo = '';

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=false)
     */
    private $mail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255, nullable=false)
     */
    private $pwd = '';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var string
     *
     * @ORM\Column(name="cle", type="string", length=255, nullable=false)
     */
    private $cle = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastcon", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $lastcon = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription", type="datetime", nullable=false)
     */
    private $inscription;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(?bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getCle(): ?string
    {
        return $this->cle;
    }

    public function setCle(string $cle): self
    {
        $this->cle = $cle;

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

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(\DateTimeInterface $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }


}
