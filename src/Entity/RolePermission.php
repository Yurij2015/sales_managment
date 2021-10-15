<?php

namespace App\Entity;

use App\Repository\RolePermissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RolePermissionRepository::class)
 */
class RolePermission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="role_permission")
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity=Permission::class, inversedBy="role_permission")
     */
    private $permission;

       public function getId(): ?int
    {
        return $this->id;
    }

       public function getRole(): ?Role
       {
           return $this->role;
       }

       public function setRole(?Role $role): self
       {
           $this->role = $role;

           return $this;
       }

       public function getPermission(): ?Permission
       {
           return $this->permission;
       }

       public function setPermission(?Permission $permission): self
       {
           $this->permission = $permission;

           return $this;
       }
}
