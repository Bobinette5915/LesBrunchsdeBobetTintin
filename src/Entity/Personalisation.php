<?php

namespace App\Entity;

use App\Repository\PersonalisationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonalisationRepository::class)]
class Personalisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $id_box = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredientSupp = null;

    
    
    
        #[ORM\Column(length: 255)]
    private ?string $id_personalisation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUtilisateur(): ?string
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(string $id_utilisateur): static
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getIdBox(): ?string
    {
        return $this->id_box;
    }

    public function setIdBox(string $id_box): static
    {
        $this->id_box = $id_box;

        return $this;
    }

    public function getIngredientSupp(): ?string
    {
        return $this->ingredientSupp;
    }

    public function setIngredientSupp(string $ingredientSupp): static
    {
        $this->ingredientSupp = $ingredientSupp;

        return $this;
    }

    public function getIdPersonalisation(): ?string
    {
        return $this->id_personalisation;
    }

    public function setIdPersonalisation(string $id_personalisation): static
    {
        $this->id_personalisation = $id_personalisation;

        return $this;
    }
}
