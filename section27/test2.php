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
    
    public function getPrice() {
        return $this->price;
    }
    
    public function updatePrice($newPrice) {
        $this->price = $newPrice;
    }
    
    public function applyDiscount($percentage) {
        $discountedPrice = $this->price - ($this->price * ($percentage / 100));
        $this->updatePrice($discountedPrice);
    }
}

class Food extends Product {
    private $ingredients;
    private $macroNutrients;
    private $calories;

    public function __construct(string $id, string $name, float $price, string $description, array $ingredients, array $macroNutrients)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->macroNutrients = $macroNutrients;
        $this->calories = $this->updateCalories();
        
        $this->addDescription();
        $this->standardizeIngredients();
    }

    private function standardizeIngredients() {
        $newIngredients = [];
        foreach ( $this->ingredients AS $key => $ing ) {
            $newIngredients[] = strtolower($ing);
        }
        $this->ingredients = $newIngredients;
    }

    private function addDescription() {
        foreach ( $this->ingredients AS $ing ) {
            if ( $ing === 'palm oil' | $ing === 'salt' | $ing === 'sugar' ) {
                $this->description = $this->description . ' Beware: Do not consume too much.';
                return;
            }
        }
    }

    public function getMacroInfo(string $name) {
        if ( array_key_exists($name, $this->macroNutrients) ) {
            return $this->macroNutrients[$name];
        }
        else {
            return 0;
        }
    }

    private function updateCalories() {
        $calories = 0;

        foreach ( $this->macroNutrients AS $key => $val ) {
            if ( $key === 'carbs' || $key === 'proteins' ) {
                $calories += ($val * 4);
            }
            else if ( $key === 'fats' ) {
                $calories += ($val * 9);
            }
        }
        return $calories;
    }
    
    public function applyDiscount($percentage) {
        $discountedPrice = $this->price - ($this->price * ($percentage / 100));
        $this->updatePrice($discountedPrice);
        
        if ( $this->calories < 200 ) {
            $discountedPrice = $this->price - ($this->price * 0.1);
            $this->updatePrice($discountedPrice);
        }
    }
}
















