<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 * 
 * @ApiResource(
 *     normalizationContext={"groups"={"payment_read"}},
 *     denormalizationContext={"groups"={"user_write"}}
 * )
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("payment_read")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"payment_read", "payment_write"})
     */
    private $price;

    /**
     * @ORM\Column(type="datetime_immutable")
     * 
     * @Groups({"payment_read", "payment_write"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable = true)
     * 
     * @Groups({"payment_read", "payment_write"})
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable = true)
     * 
     * @Groups({"payment_read", "payment_write"})
     */
    private $validatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getValidatedAt(): ?\DateTimeImmutable
    {
        return $this->validatedAt;
    }

    public function setValidatedAt(\DateTimeImmutable $validatedAt): self
    {
        $this->validatedAt = $validatedAt;

        return $this;
    }
}
