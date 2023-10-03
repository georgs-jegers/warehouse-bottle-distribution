# Warehouse Bottles Distribution
This PHP code defines a Warehouse class and a requestBottles function to distribute a given number of bottles equally among different sections of a warehouse.

Example Usage
```shell
$warehouse = new Warehouse(array(
    'section1' => 2,
    'section2' => 5,
    'section3' => 10
));

$warehouse->dispatchBottles(1);
```

Running the Code
```bash
php index.php
```
