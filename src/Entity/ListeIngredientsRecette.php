<?php

namespace App\Entity;

use App\Repository\ListeIngredientsRecetteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups ;

/**
 * @ORM\Entity(repositoryClass=ListeIngredientsRecetteRepository::class)
 */
class ListeIngredientsRecette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups("recette:read")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=32)
     * @Groups("recette:read")
     */
    private $unite;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="listeIngredientsRecettes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("recette:read")
     */
    private $ingredientID;

    /**
     * @ORM\ManyToOne(targetEntity=Recette::class, inversedBy="listeIngredientsRecette")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recette;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIngredientID(): ?Ingredient
    {
        return $this->ingredientID;
    }

    public function setIngredientID(?Ingredient $ingredientID): self
    {
        $this->ingredientID = $ingredientID;

        return $this;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): self
    {
        $this->recette = $recette;

        return $this;
    }
}
