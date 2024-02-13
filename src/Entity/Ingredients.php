<?php

namespace App\Entity;

use App\Repository\IngredientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientsRepository::class)]
class Ingredients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $quantites = null;

    #[ORM\ManyToMany(targetEntity: Boxs::class, mappedBy: 'ingredients')]
    private Collection $boxs;

    #[ORM\ManyToMany(targetEntity: Boxs::class, mappedBy: 'quantites')]
    private Collection $Quant;

    public function __construct()
    {
        $this->boxs = new ArrayCollection();
        $this->Quant = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getQuantites(): ?float
    {
        return $this->quantites;
    }

    public function setQuantites(float $quantites): static
    {
        $this->quantites = $quantites;

        return $this;
    }

    /**
     * @return Collection<int, Boxs>
     */
    public function getBoxs(): Collection
    {
        return $this->boxs;
    }

    public function addBox(Boxs $box): static
    {
        if (!$this->boxs->contains($box)) {
            $this->boxs->add($box);
            $box->addIngredient($this);
        }

        return $this;
    }

    public function removeBox(Boxs $box): static
    {
        if ($this->boxs->removeElement($box)) {
            $box->removeIngredient($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Boxs>
     */
    public function getQuant(): Collection
    {
        return $this->Quant;
    }

}