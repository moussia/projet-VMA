<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ServicesRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicesRepository::class)
 * 
 * @ApiResource(
 *  collectionOperations={"get"={"normalization_context"={"groups"="services:list"}}},
 *  itemOperations={"get"={"normalization_context"={"groups"="services:item"}}},
 *  paginationEnabled=false
 * )
 */
class Services
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Professionals::class, inversedBy="name")
     */
    private $id_pro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service_name;

    /**
     * @ORM\Column(type="float")
     */
    private $price_per_hour;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getServiceName(): ?string
    {
        return $this->service_name;
    }

    public function setServiceName(string $service_name): self
    {
        $this->service_name = $service_name;

        return $this;
    }

    public function getPricePerHour(): ?float
    {
        return $this->price_per_hour;
    }

    public function setPricePerHour(float $price_per_hour): self
    {
        $this->price_per_hour = $price_per_hour;

        return $this;
    }
}
