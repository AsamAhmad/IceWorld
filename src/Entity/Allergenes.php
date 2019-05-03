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
     * @ORM\ManyToMany(targetEntity="App\Entity\Glace", mappedBy="Allergenes")
     */
    private $glaces;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->glaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
