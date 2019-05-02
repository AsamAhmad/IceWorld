<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AllergenesRepository")
 */
class Allergenes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $gluten;

    /**
     * @ORM\Column(type="integer")
     */
    private $oeuf;

    /**
     * @ORM\Column(type="integer")
     */
    private $fruit_a_coque;

    /**
     * @ORM\Column(type="integer")
     */
    private $lait;

    /**
     * @ORM\Column(type="integer")
     */
    private $soja;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Glace", mappedBy="Allergenes")
     */
    private $glaces;

    public function __construct()
    {
        $this->glaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGluten(): ?int
    {
        return $this->gluten;
    }

    public function setGluten(int $gluten): self
    {
        $this->gluten = $gluten;

        return $this;
    }

    public function getOeuf(): ?int
    {
        return $this->oeuf;
    }

    public function setOeuf(int $oeuf): self
    {
        $this->oeuf = $oeuf;

        return $this;
    }

    public function getFruitACoque(): ?int
    {
        return $this->fruit_a_coque;
    }

    public function setFruitACoque(int $fruit_a_coque): self
    {
        $this->fruit_a_coque = $fruit_a_coque;

        return $this;
    }

    public function getLait(): ?int
    {
        return $this->lait;
    }

    public function setLait(int $lait): self
    {
        $this->lait = $lait;

        return $this;
    }

    public function getSoja(): ?int
    {
        return $this->soja;
    }

    public function setSoja(int $soja): self
    {
        $this->soja = $soja;

        return $this;
    }

    /**
     * @return Collection|Glace[]
     */
    public function getGlaces(): Collection
    {
        return $this->glaces;
    }

    public function addGlace(Glace $glace): self
    {
        if (!$this->glaces->contains($glace)) {
            $this->glaces[] = $glace;
            $glace->addAllergene($this);
        }

        return $this;
    }

    public function removeGlace(Glace $glace): self
    {
        if ($this->glaces->contains($glace)) {
            $this->glaces->removeElement($glace);
            $glace->removeAllergene($this);
        }

        return $this;
    }
}
