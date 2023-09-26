<?php

namespace Mbissonho\PhpAlgo;

class Fibonacci implements AlgorithmInterface
{
    private $sequence = [1];

    public function execute(array $args)
    {
        if(!isset($args['last_number']) || !is_integer($args['last_number'])) {
            throw new \InvalidArgumentException("Missing 'last_number' argument");
        }

        $algo = function (&$currentSequence, $lastNumber) use (&$algo) {
            if(count($currentSequence) == 1) {
                $currentSequence[] =  1;
                $algo($currentSequence, $lastNumber);
                return;
            }

            $currentIndex = count($currentSequence) - 1;

            if($currentSequence[$currentIndex] == $lastNumber) {
                return;
            }

            $currentSequence[] = ($currentSequence[$currentIndex] + $currentSequence[$currentIndex - 1]);
            $algo($currentSequence, $lastNumber);
        };

        $algo($this->sequence, $args['last_number']);

        return $this->sequence;
    }
}