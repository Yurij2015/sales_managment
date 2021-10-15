<?php

namespace App\Entity;

use App\Repository\PermissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PermissionRepository::class)
 */
class Permission
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
     * @ORM\OneToMany(targetEntity=RolePermission::class, mappedBy="permission")
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
            $rolePermission->setPermission($this);
        }

        return $this;
    }

    public function removeRolePermission(RolePermission $rolePermission): self
    {
        if ($this->role_permission->removeElement($rolePermission)) {
            // set the owning side to null (unless already changed)
            if ($rolePermission->getPermission() === $this) {
                $rolePermission->setPermission(null);
            }
        }

        return $this;
    }
}
