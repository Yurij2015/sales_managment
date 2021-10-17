<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function __toString(){
        return $this->ordertitle;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ordertitle;

    public function getOrdertitle(): ?string
    {
        return $this->ordertitle;
    }

    public function setOrdertitle(string $ordertitle): self
    {
        $this->ordertitle = $ordertitle;

        return $this;
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $summ;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paystatus;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\OneToOne(targetEntity=ApplicationForm::class, mappedBy="orders", cascade={"persist", "remove"})
     */
    private $application_form_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orderitem")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSumm(): ?float
    {
        return $this->summ;
    }

    public function setSumm(float $summ): self
    {
        $this->summ = $summ;

        return $this;
    }

    public function getPaystatus(): ?bool
    {
        return $this->paystatus;
    }

    public function setPaystatus(bool $paystatus): self
    {
        $this->paystatus = $paystatus;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getApplicationFormId(): ?ApplicationForm
    {
        return $this->application_form_id;
    }

    public function setApplicationFormId(ApplicationForm $application_form_id): self
    {
        // set the owning side of the relation if necessary
        if ($application_form_id->getOrders() !== $this) {
            $application_form_id->setOrders($this);
        }

        $this->application_form_id = $application_form_id;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
