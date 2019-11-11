<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuActionRepository")
 */
class MenuAction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $action;

    public function __construct()
    {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;

        return $this;
    }
//
//    /**
//     * @return Collection|User[]
//     */
//    public function getUser(): Collection
//    {
//        return $this->user;
//    }
//
//    public function addUser(User $user): self
//    {
//        if (!$this->user->contains($user)) {
//            $this->user[] = $user;
//        }
//
//        return $this;
//    }
//
//    public function removeUser(User $user): self
//    {
//        if ($this->user->contains($user)) {
//            $this->user->removeElement($user);
//        }
//
//        return $this;
//    }
}
