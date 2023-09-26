<?php

use Mbissonho\PhpAlgo\Fibonacci;

require __DIR__ . '/../vendor/autoload.php';

print_r((new Fibonacci())->execute([
    'last_number' => 89
]));