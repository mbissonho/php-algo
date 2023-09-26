<?php

namespace Mbissonho\PhpAlgo;

class Fibonacci implements AlgorithmInterface, \Stringable
{
    private $sequence = [1, 1];

    public function execute(array $args)
    {
        if(!isset($args['last_number']) || !is_integer($args['last_number'])) {
            throw new \InvalidArgumentException("Invalid 'last_number' argument");
        }

        $algo = function (&$currentSequence, $lastNumber) use (&$algo) {

            $currentIndex = count($currentSequence) - 1;

            if($currentSequence[$currentIndex] == $lastNumber) {
                return;
            }

            $currentSequence[] = ($currentSequence[$currentIndex] + $currentSequence[$currentIndex - 1]);

            $lastInsertedNumber = $currentSequence[$currentIndex + 1];

            if($lastInsertedNumber > $lastNumber) {
                $lastNumber = $lastInsertedNumber;
            }

            $algo($currentSequence, $lastNumber);
        };

        $algo($this->sequence, $args['last_number']);
        return $this->sequence;
    }

    public function __toString(): string
    {
        return implode(" - ", $this->sequence);
    }
}