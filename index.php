<?php
class Warehouse {
    public $sections;

    public function __construct($sections) {
        $this->sections = $sections;
    }

    public function distributeBottlesEqually($storeBottles) {
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

    public function getAvailableBottles($section) {
        return isset($this->sections[$section]) ? $this->sections[$section] : 0;
    }

    public function requestBottles($storeBottles) {
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
$warehouse = new Warehouse(array(
    'section1' => 2,
    'section2' => 5,
    'section3' => 10
));

$warehouse->requestBottles(1);
?>
