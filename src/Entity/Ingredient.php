<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups ;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("recette:read")
     */
    private $intitule;

    /**
     * @ORM\OneToMany(targetEntity=ListeIngredientsRecette::class, mappedBy="ingredientID")
     */
    private $listeIngredientsRecettes;

    public function __construct()
    {
        $this->listeIngredientsRecettes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection|ListeIngredientsRecette[]
     */
    public function getListeIngredientsRecettes(): Collection
    {
        return $this->listeIngredientsRecettes;
    }

    public function addListeIngredientsRecette(ListeIngredientsRecette $listeIngredientsRecette): self
    {
        if (!$this->listeIngredientsRecettes->contains($listeIngredientsRecette)) {
            $this->listeIngredientsRecettes[] = $listeIngredientsRecette;
            $listeIngredientsRecette->setIngredientID($this);
        }

        return $this;
    }

    public function removeListeIngredientsRecette(ListeIngredientsRecette $listeIngredientsRecette): self
    {
        if ($this->listeIngredientsRecettes->removeElement($listeIngredientsRecette)) {
            // set the owning side to null (unless already changed)
            if ($listeIngredientsRecette->getIngredientID() === $this) {
                $listeIngredientsRecette->setIngredientID(null);
            }
        }

        return $this;
    }

}
