<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)

 */
class Service
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
    private ?string $title;

    public function __toString(){
        return $this->title;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $desctiption;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $cost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    /**
     * @ORM\Column(type="string", length=30)
     */
    private ?string $service_articul;

    public function getServiceArticul(): ?string
    {
        return $this->service_articul;
    }

    public function setServiceArticul(string $service_articul): self
    {
        $this->service_articul = $service_articul;

        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="service")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category_serv;

    public function getCategory(): ?Category
    {
        return $this->category_serv;
    }

    public function setCategory(?Category $category_serv): self
    {
        $this->category_serv = $category_serv;

        return $this;
    }


    /**
     * @ORM\OneToMany(targetEntity=ObjectInAppForm::class, mappedBy="service")
     */
    private $object_in_app_form;

    public function __construct()
    {
        $this->object_in_app_form = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDesctiption(): ?string
    {
        return $this->desctiption;
    }

    public function setDesctiption(string $desctiption): self
    {
        $this->desctiption = $desctiption;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->Product;
    }

    public function setProduct(string $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    /**
     * @return Collection|ObjectInAppForm[]
     */
    public function getObjectInAppForm(): Collection
    {
        return $this->object_in_app_form;
    }

    public function addObjectInAppForm(ObjectInAppForm $objectInAppForm): self
    {
        if (!$this->object_in_app_form->contains($objectInAppForm)) {
            $this->object_in_app_form[] = $objectInAppForm;
            $objectInAppForm->setService($this);
        }

        return $this;
    }

    public function removeObjectInAppForm(ObjectInAppForm $objectInAppForm): self
    {
        if ($this->object_in_app_form->removeElement($objectInAppForm)) {
            // set the owning side to null (unless already changed)
            if ($objectInAppForm->getService() === $this) {
                $objectInAppForm->setService(null);
            }
        }

        return $this;
    }
}
