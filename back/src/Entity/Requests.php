<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RequestRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"requests:read"}},
 *     denormalizationContext={"groups"={"requests:write"}},
 *     collectionOperations={
 *         "get",
 *         "post"={"security"="is_granted('ROLE_USER')"}
 *     },
 * )
 * @ORM\Entity(repositoryClass=RequestsRepository::class)
 */
class Requests
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"requests:read", "user:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Parents::class)
     * @ORM\JoinColumn(nullable=false)
     * 
     * @Groups({"requests:read", "requests:write", "user:read"})
     */
    private $id_parents;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"requests:read", "requests:write", "user:read"})
     */
    private $hours;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"requests:read", "requests:write", "user:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"requests:read", "requests:write", "user:read"})
     */
    private $status;

    /**
     * @ORM\Column(type="datetime_immutable")
     * 
     * @Groups({"requests:read", "requests:write", "user:read"})
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdParents(): ?Parents
    {
        return $this->id_parents;
    }

    public function setIdParents(?Parents $id_parents): self
    {
        $this->id_parents = $id_parents;

        return $this;
    }

    public function getHours(): ?int
    {
        return $this->hours;
    }

    public function setHours(int $hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
