<?php

use Mbissonho\PhpAlgo\Fibonacci;

require __DIR__ . '/../vendor/autoload.php';

$fib = new Fibonacci();
$fib->execute(['last_number' => 89]);
echo $fib . PHP_EOL;