<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BasketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasketRepository::class)
 * 
 * @ApiResource(
 *  collectionOperations={"get"={"normalization_context"={"groups"="basket:list"}}},
 *  itemOperations={"get"={"normalization_context"={"groups"="basket:item"}}},
 *  paginationEnabled=false
 * )
 */
class Basket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=parents::class, inversedBy="baskets")
     */
    private $id_parent;

    /**
     * @ORM\ManyToMany(targetEntity=services::class)
     */
    private $id_service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $satatus;

    public function __construct()
    {
        $this->id_service = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdParent(): ?parents
    {
        return $this->id_parent;
    }

    public function setIdParent(?parents $id_parent): self
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    /**
     * @return Collection|services[]
     */
    public function getIdService(): Collection
    {
        return $this->id_service;
    }

    public function addIdService(services $idService): self
    {
        if (!$this->id_service->contains($idService)) {
            $this->id_service[] = $idService;
        }

        return $this;
    }

    public function removeIdService(services $idService): self
    {
        $this->id_service->removeElement($idService);

        return $this;
    }

    public function getSatatus(): ?string
    {
        return $this->satatus;
    }

    public function setSatatus(string $satatus): self
    {
        $this->satatus = $satatus;

        return $this;
    }
}
