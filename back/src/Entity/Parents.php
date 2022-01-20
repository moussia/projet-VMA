<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\ParentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParentsRepository::class)
 * 
 * @ApiResource()
 */
class Parents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Children::class, mappedBy="parents")
     */
    private $id_children;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $role;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_user;

    public function __construct()
    {
        $this->id_children = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Children[]
     */
    public function getIdChildren(): Collection
    {
        return $this->id_children;
    }

    public function addIdChild(Children $idChild): self
    {
        if (!$this->id_children->contains($idChild)) {
            $this->id_children[] = $idChild;
            $idChild->setParents($this);
        }

        return $this;
    }

    public function removeIdChild(Children $idChild): self
    {
        if ($this->id_children->removeElement($idChild)) {
            // set the owning side to null (unless already changed)
            if ($idChild->getParents() === $this) {
                $idChild->setParents(null);
            }
        }

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
