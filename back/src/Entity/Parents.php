<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\ParentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ParentsRepository::class)
 * 
 * @ApiResource(
 *     normalizationContext={"groups"={"parents_read"}},
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     itemOperations={
 *         "patch"={"security_post_denormalize"="is_granted('PARENT_EDIT', user)"},
 *         "delete"={"security_post_denormalize"="is_granted('ROLE_ADMIN', user)"},
 *     }
 * )
 */
class Parents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("parents_read")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Children::class, mappedBy="parents")
     * 
     * @Groups("parents_read")
     */
    private $id_children;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups("parents_read")
     */
    private $role;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     * 
     * @Groups("parents_read")
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
            $idChild->setIdParent($this);
        }

        return $this;
    }

    public function removeIdChild(Children $idChild): self
    {
        if ($this->id_children->removeElement($idChild)) {
            // set the owning side to null (unless already changed)
            if ($idChild->getIdParent() === $this) {
                $idChild->setIdParent(null);
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
