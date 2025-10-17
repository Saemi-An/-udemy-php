<?php

class Product {
    protected $id;
    protected $name;
    protected $price;
    protected $description;

    public function __construct(string $id, string $name, float $price, string $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getPrice(): float {
        return $this->price;
    }
    public function updatePrice(float $newPrice): float {
        return $this->price = $newPrice;
    }
    public function applyDiscount(float $rate): float {
        $originalPrice = $this->price;
        return $this-> price = $originalPrice - ($this->price * $rate / 100);
    }

}

class Electronics extends Product {
    protected $id;
    protected $name;
    protected $price;
    protected $description;
    private $voltage;
    private $warranty;

    
    public function __construct(string $id, string $name, float $price, string $description, int $voltage, string $warranty) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        
        $this->voltage = $voltage;
        $this->warranty = $warranty;
    }
}

class Clothing extends Product {
    protected $id;
    protected $name;
    protected $price;
    protected $description;
    private $size;
    private $material;
    private $careInstructions;

    
    public function __construct(string $id, string $name, float $price, string $description, string $size, string $material, $careInstructions) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        
        $this->size = $this->verifySize($size);
        $this->material = $material;
        $this->careInstructions = $this->verifyCareInstructions($careInstructions);

    }

    private function verifySize($size): string {
        $options = ['XS', 'S', 'M', 'L', 'XL'];

        if ( in_array($size, $options) ) {
            return $size;
        }
        else {
            return 'M';
        }
    }

    private function verifyCareInstructions($val): string {
        if ( is_string($val) ) {
            return $val;
        }
        else {
            return implode('; ', $val);
        }
    }
}