<?php
header('Content-Type: text/plain');

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
}

class Electronics extends Product {
    protected string $id;
    protected string $name;
    protected float $price;
    protected string $description;
    private int $voltage;
    private string $warranty;

    
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
    protected string $id;
    protected string $name;
    protected float $price;
    protected string $description;
    protected string $size;
    protected string $material;
    protected string|array $careInstructions;

    
    public function __construct(string $id, string $name, float $price, string $description, int $size, string $material, string|array $careInstructions) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        
        $this->size = $this->verifySize($size);
        $this->material = $material;
        $this->careInstructions = $careInstructions;

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
}