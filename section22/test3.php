<?php

// Alternatively, incorporate the code from the previous part here.
// Previous requirements will not be tested again!

class Amenity {
    public $name;
    public $movable;
    public $description;

    public function __construct(string $name, bool $movable, string $description) {
        $this->name = $name;
        $this->movable = $movable;
        $this->description = $description;
    }
}

class Room {
    public $roomNumber;
    public $rate;
    public $amenities;
    
    public function __construct(int $roomNumber, float $rate, array $amenities) {
        $this->roomNumber = $roomNumber;
        $this->rate = $rate;
        $this->amenities = $amenities; 
    }
    
    public function getRoomNumber(): int {
        return $this->roomNumber;
    }

    public function calculateCost(int $numberOfDays): float {
        $totalCost = $this->rate * $numberOfDays;
        return round($totalCost, 2);
    }
    
    public function createDescription(): string {
        $descriptions = '';
        foreach ($this->amenities as $amenity) {
            $descriptions .= $amenity->description . ' ';
        }
        return $descriptions;
    }

    // Write your code here

    private function addAmenity(Amenity $obj) {
        $this->amenities[] = $obj;
    }

    public function removeAmenity(string $name) {
        var_dump($this->amenities);
        foreach ( $this->amenities AS $key => $obj ) {
            if ( $obj->name === $name ) {
                unset($this->amenities[$key]);
                
                // 재정렬
                $this->amenities = array_values($this->amenities);
                var_dump($this->amenities);
                return;
            }
        }
    }

    private function checkAmenityExists(string $amenityName) {
        //It first verifies the presence and movability of the specified amenity in the current room ($this).
        foreach ( $this->amenities AS $key=>$obj ) {
            if ( $obj->name === $amenityName && $obj->movable === true ) {
                return $key;
            }
        }
        return null;
    }

    private function transferAmenity(Room $to, string $amenityName) {

        $key = $this->checkAmenityExists($amenityName);
        if ( $key !== null ) {
            // Upon confirmation, the amenity is removed from the current room and added to the $to room, simulating a real-life amenity transfer scenario.
            $to->amenities[] = $this->amenities[$key];
            // unset($this->amenities[$key]);
            $this->removeAmenity($amenityName);
        }
    }

}


// $espressoMachine = new Amenity('Espresso Machine', true, 'Single serve espresso machine with complimentary coffee pods.');
// $balconyView = new Amenity('Balcony View', false, 'Private balcony with ocean view.');
// $hotTub = new Amenity('Hot Tub', false, 'In-room hot tub with adjustable temperature settings.');

// $amenities = [$espressoMachine, $balconyView, $hotTub];

// $room_1 = new Room(202, 500, $amenities);

// $room_1->removeAmenity('Balcony View');

$ary = [
    0 => '라프텔',
    1 => '캐치테이블',
    2 => '넷플릭스',
];

var_dump($ary);

unset($ary[0]);

// var_dump($ary);
var_dump(array_values($ary));

