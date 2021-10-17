<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $title;

    public function __toString(){
        return $this->title;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $cost;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prod_articul;

    /**
     * @ORM\OneToMany(targetEntity=ObjectInAppForm::class, mappedBy="product")
     */
    private $object_in_app_form;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getProdArticul(): ?string
    {
        return $this->prod_articul;
    }

    public function setProdArticul(string $prod_articul): self
    {
        $this->prod_articul = $prod_articul;

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
            $objectInAppForm->setProduct($this);
        }

        return $this;
    }

    public function removeObjectInAppForm(ObjectInAppForm $objectInAppForm): self
    {
        if ($this->object_in_app_form->removeElement($objectInAppForm)) {
            // set the owning side to null (unless already changed)
            if ($objectInAppForm->getProduct() === $this) {
                $objectInAppForm->setProduct(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
