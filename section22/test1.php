<pre><?php
// 유데미는 PHP 7 사용중이라 PHP 7에서는 반드시 클래스 프로퍼티를 먼저 선언하고, 그 후 생성자에서 값을 할당해야만함

// Integrate an amenities array into the Room class to store Amenity objects.
// This new property complements the room's basic details established in Part 1.
// Specifically, the amenities property should be initialized within the constructor alongside the established roomNumber and rate properties, ensuring a comprehensive setup of each Room instance from the outset.

// Alternatively, incorporate your code from the previous part here.
// Previous requirements will not be tested again!

class Room {
    // Define properties without explicit type declarations for PHP 7 compatibility
    public $roomNumber;
    public $rate;
    public $amenities;
    
    // Constructor method to initialize the Room object with room number and rate
    public function __construct(int $roomNumber, float $rate, array $amenities){
        $this->roomNumber = $roomNumber;
        $this->rate = $rate;
        $this->amenities = $amenities;
    }
    
    // Method to retrieve the room number
    public function getRoomNumber(): int {
        return $this->roomNumber;
    }

    // Method to calculate the total cost of the stay given the number of days
    public function calculateCost(int $numberOfDays): ?float{
        if($numberOfDays <= 0){
            return null;
        }
        $totalCost = $this->rate * $numberOfDays;
        return round($totalCost, 2);
    }

    public function createDescription():string {
        
        $whole_description = '';

        foreach ( $this->amenities AS $obj ) {
            $whole_description = $whole_description . ' ' . $obj->description;
        }
        
        return $whole_description;
    }
}

// Write your code here
class Amenity {
    public $name;
    public $movable;
    public $description;

    function __construct(string $name, bool $movable, string $description) {
        $this->name = $name;
        $this->movable = $movable;
        $this->description = $description;
    }
}

$espressoMachine = new Amenity('Espresso Machine', true, 'Single serve espresso machine with complimentary coffee pods.');
$balconyView = new Amenity('Balcony View', false, 'Private balcony with ocean view.');
$hotTub = new Amenity('Hot Tub', false, 'In-room hot tub with adjustable temperature settings.');

$amenities = [$espressoMachine, $balconyView, $hotTub];
var_dump($amenities);

$result = '';
foreach ($amenities AS $val) {
    var_dump($val);
    // $result = $result . $val;
}

var_dump($result);

?></pre>