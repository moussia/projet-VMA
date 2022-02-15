<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChildrenRepository::class)
 * 
 * @ApiResource(
 *     normalizationContext={"groups"={"children_read"}},
 *     denormalizationContext={"groups"={"children_write"}},
 *     attributes={"security"="is_granted('ROLE_USER', 'ROLE_PARENT')"},
 *     collectionOperations={
 *         "post"={"security"="is_granted('ROLE_PARENT')"},
 *         "get"={"security"="is_granted('ROLE_PARENT')"},
 *     },
 *     itemOperations={
 *         "put"={"security_post_denormalize"="is_granted('PARENT_EDIT', user)"}, 
 *         "patch"={"security_post_denormalize"="is_granted('PARENT_EDIT', user)"},
 *         "delete"={"security_post_denormalize"="is_granted('ROLE_ADMIN', user)"},
 *     }
 * )
 */
class Children
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("children_read", "user_read")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Parents::class, inversedBy="childrens")
     * @ORM\JoinColumn(nullable=false)
     * 
     * @Groups("children_read", "user_read")
     */
    private $id_parent;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotNull
     * @Groups("children_read", "children_write")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotNull
     * @Groups("children_read", "parent_read", "children_write")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups("children_read", "parent_read", "children_write")
     */
    private $gender;

    /**
     * @ORM\Column(type="date", nullable=true)
     * 
     * @Groups("children_read", "parent_read")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups("children_read", "parent_read", "children_write")
     * @Assert\Length(
     *     min = 1,
     *     max = 800
     * )

     */
    private $observation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdParent(): ?Parents
    {
        return $this->id_parent;
    }

    public function setIdParent(?Parents $id_parent): self
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
}
