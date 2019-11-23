<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $orderList = [];

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Restaurant", inversedBy="commandes")
     */
    private $restaurant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commandes")
     */
    private $client;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $retrieveTime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->restaurant;
    }

    public function getOrderList(): ?array
    {
        return $this->orderList;
    }

    public function setOrderList(array $orderList): self
    {
        $this->orderList = $orderList;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getRetrieveTime(): ?\DateTimeInterface
    {
        return $this->retrieveTime;
    }

    public function setRetrieveTime(?\DateTimeInterface $retrieveTime): self
    {
        $this->retrieveTime = $retrieveTime;

        return $this;
    }
}
