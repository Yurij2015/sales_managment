<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="role")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=RolePermission::class, mappedBy="role")
     */
    private $role_permission;

    public function __construct()
    {
        $this->role_permission = new ArrayCollection();
    }

       public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setRole($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getRole() === $this) {
                $user->setRole(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RolePermission[]
     */
    public function getRolePermission(): Collection
    {
        return $this->role_permission;
    }

    public function addRolePermission(RolePermission $rolePermission): self
    {
        if (!$this->role_permission->contains($rolePermission)) {
            $this->role_permission[] = $rolePermission;
            $rolePermission->setRole($this);
        }

        return $this;
    }

    public function removeRolePermission(RolePermission $rolePermission): self
    {
        if ($this->role_permission->removeElement($rolePermission)) {
            // set the owning side to null (unless already changed)
            if ($rolePermission->getRole() === $this) {
                $rolePermission->setRole(null);
            }
        }

        return $this;
    }
}
