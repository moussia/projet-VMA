<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RequestStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RequestStatusRepository::class)
 */
class RequestStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Requests::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_requests;

    /**
     * @ORM\ManyToOne(targetEntity=Professionals::class)
     */
    private $id_pro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $response_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRequests(): ?Requests
    {
        return $this->id_requests;
    }

    public function setIdRequests(?Requests $id_requests): self
    {
        $this->id_requests = $id_requests;

        return $this;
    }

    public function getIdPro(): ?Professionals
    {
        return $this->id_pro;
    }

    public function setIdPro(?Professionals $id_pro): self
    {
        $this->id_pro = $id_pro;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getResponseAt(): ?\DateTimeImmutable
    {
        return $this->response_at;
    }

    public function setResponseAt(?\DateTimeImmutable $response_at): self
    {
        $this->response_at = $response_at;

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
