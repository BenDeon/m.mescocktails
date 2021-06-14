<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CocktailsNote
 *
 * @ORM\Table(name="cocktails_note", indexes={@ORM\Index(name="barman", columns={"barman", "cocktail"})})
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="App\Repository\CocktailsNoteRepository")
*/
class CocktailsNote
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
     * @var int
     *
     * @ORM\Column(name="cocktail", type="bigint", nullable=false)
     */
    private $cocktail = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=10, scale=0, nullable=false)
     */
    private $note = '0';

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

    public function getCocktail(): ?string
    {
        return $this->cocktail;
    }

    public function setCocktail(string $cocktail): self
    {
        $this->cocktail = $cocktail;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }


}
