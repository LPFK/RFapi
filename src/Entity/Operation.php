<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
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
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Recette::class, inversedBy="listeOperations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recetteID;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRecetteID(): ?Recette
    {
        return $this->recetteID;
    }

    public function setRecetteID(?Recette $recetteID): self
    {
        $this->recetteID = $recetteID;

        return $this;
    }
}
