<?php

namespace App\Entity;

use App\Repository\ObjectInAppFormRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectInAppFormRepository::class)
 */
class ObjectInAppForm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $product_count;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $service_count;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationForm::class, inversedBy="object_in_app_form")
     * @ORM\JoinColumn(nullable=false)
     */
    private $applicationForm;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="object_in_app_form")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="object_in_app_form")
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductCount(): ?int
    {
        return $this->product_count;
    }

    public function setProductCount(?int $product_count): self
    {
        $this->product_count = $product_count;

        return $this;
    }

    public function getServiceCount(): ?int
    {
        return $this->service_count;
    }

    public function setServiceCount(?int $service_count): self
    {
        $this->service_count = $service_count;

        return $this;
    }

    public function getApplicationForm(): ?ApplicationForm
    {
        return $this->applicationForm;
    }

    public function setApplicationForm(?ApplicationForm $applicationForm): self
    {
        $this->applicationForm = $applicationForm;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
