<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("recette:read")
     */
    private $resumer;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="recetteID")
     * @Groups("recette:read")
     */
    private $listeOperations;

    /**
     * @ORM\OneToMany(targetEntity=ListeIngredientsRecette::class, mappedBy="recette")
     * @Groups("recette:read")
     */
    private $listeIngredientsRecette;

    public function __construct()
    {
        $this->listeIngredientsRecette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResumer(): ?string
    {
        return $this->resumer;
    }

    public function setResumer(string $resumer): self
    {
        $this->resumer = $resumer;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getListeOperations(): Collection
    {
        return $this->listeOperations;
    }

    public function addListeOperation(Operation $listeOperation): self
    {
        if (!$this->listeOperations->contains($listeOperation)) {
            $this->listeOperations[] = $listeOperation;
            $listeOperation->setRecetteID($this);
        }

        return $this;
    }

    public function removeListeOperation(Operation $listeOperation): self
    {
        if ($this->listeOperations->removeElement($listeOperation)) {
            // set the owning side to null (unless already changed)
            if ($listeOperation->getRecetteID() === $this) {
                $listeOperation->setRecetteID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ListeIngredientsRecette[]
     */
    public function getListeIngredientsRecette(): Collection
    {
        return $this->listeIngredientsRecette;
    }

    public function addListeIngredientsRecette(ListeIngredientsRecette $listeIngredientsRecette): self
    {
        if (!$this->listeIngredientsRecette->contains($listeIngredientsRecette)) {
            $this->listeIngredientsRecette[] = $listeIngredientsRecette;
            $listeIngredientsRecette->setRecette($this);
        }

        return $this;
    }

    public function removeListeIngredientsRecette(ListeIngredientsRecette $listeIngredientsRecette): self
    {
        if ($this->listeIngredientsRecette->removeElement($listeIngredientsRecette)) {
            // set the owning side to null (unless already changed)
            if ($listeIngredientsRecette->getRecette() === $this) {
                $listeIngredientsRecette->setRecette(null);
            }
        }

        return $this;
    }

}
