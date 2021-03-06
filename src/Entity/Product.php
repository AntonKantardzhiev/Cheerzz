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
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;




    public function __construct()
    {
        $this->orderLines = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function __toString()
    {
       return $this->name;
    }


    /**
     * @param string $ingredientName
     * @return string
     */
    public function fetchIngredientImageURLSmall(string $ingredientName): string
    {
        return "https://www.thecocktaildb.com/images/ingredients/" .$ingredientName . "-Small.png";
    }

    /**
     * @param string $ingredientName
     * @return string
     */
    public function fetchIngredientImageURLMedium(string $ingredientName): string
    {
        return "https://www.thecocktaildb.com/images/ingredients/" .$ingredientName . "-Medium.png";
    }

    /**
     * @param string $ingredientName
     * @return string
     */
    public function fetchIngredientImageURLLarge(string $ingredientName): string
    {
        return "https://www.thecocktaildb.com/images/ingredients/" . $ingredientName . ".png";
    }



}
