<?php
class Warehouse {
    public array $sections;

    public function __construct(array $sections) {
        $this->sections = $sections;
    }

    public function distributeBottlesEqually(int $storeBottles): void {
        $sectionCount = count($this->sections);
        $bottlesPerSection = floor($storeBottles / $sectionCount);
        $remainingBottles = $storeBottles % $sectionCount;

        foreach ($this->sections as $section => $availableSpace) {
            $distributedBottles = $bottlesPerSection;

            if ($remainingBottles > 0) {
                $distributedBottles++;
                $remainingBottles--;
            }

            $this->sections[$section] += $distributedBottles;
        }
    }

    public function getAvailableBottles(string $section): int {
        return isset($this->sections[$section]) ? $this->sections[$section] : 0;
    }

    public function shipmentBottles(int $storeBottles): void {
        $this->distributeBottlesEqually($storeBottles);

        $total = 0;

        foreach ($this->sections as $section => $count) {
            echo "Section $section: $count bottles\n";
            $total += $count;
        }

        echo "Total: $total bottles\n";
    }
}

// Example usage
$warehouse = new Warehouse([
    'section1' => 2,
    'section2' => 5,
    'section3' => 10
]);

$warehouse->shipmentBottles(11);

// Result 
// Section section1: 6 bottles
// Section section2: 9 bottles
// Section section3: 13 bottles
// Total: 28 bottles


?>
