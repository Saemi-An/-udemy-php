<?php

class Food {
    private $macroNutrients;
    private $calories;

    public function __construct(array $macroNutrients)
    {
        $this->macroNutrients = $macroNutrients;
        $this->calories = $this->updateCalories();
    }

    private function updateCalories() {
        var_dump($this->calories);
        var_dump($this->macroNutrients);
        
        foreach ( $this->macroNutrients AS $key => $val ) {
            if ( $key === 'carbs' || $key === 'proteins' ) {
                $this->calories += ($val * 4);
                var_dump('곱하기 4');
                var_dump($this->calories);
            }
            else if ( $key === 'fats' ) {
                $this->calories += ($val * 9);
            }
        }
        var_dump('파이널 칼로리: ');
        var_dump($this->calories);
    }

}

$macroNutrients = ['carbs' => 30, 'proteins' => 20, 'fats' => 10];
$food = new Food($macroNutrients);
var_dump($food);












