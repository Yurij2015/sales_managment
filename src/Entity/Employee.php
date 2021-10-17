<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
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
    private $fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $employee_info;

    /**
     * @ORM\ManyToOne(targetEntity=Position::class, inversedBy="employee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $position;

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmployeeInfo(): ?string
    {
        return $this->employee_info;
    }

    public function setEmployeeInfo(?string $employee_info): self
    {
        $this->employee_info = $employee_info;

        return $this;
    }


}
