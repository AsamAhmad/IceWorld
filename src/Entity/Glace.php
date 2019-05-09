<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GlaceRepository")
 */
class Glace
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $allergenes;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;




    /**
     * @ORM\Column(type="string", length=64)
     */


    public function __construct()
    {
        $this->Allergenes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAllergenes()
    {
        return $this->allergenes;
    }

    public function setAllergenes(string $allergenes): self
    {
        $this->allergenes = $allergenes;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function addAllergene(Allergenes $allergene): self
    {
        if (!$this->Allergenes->contains($allergene)) {
            $this->Allergenes[] = $allergene;
        }

        return $this;
    }

    public function removeAllergene(Allergenes $allergene): self
    {
        if ($this->Allergenes->contains($allergene)) {
            $this->Allergenes->removeElement($allergene);
        }

        return $this;
    }



}
