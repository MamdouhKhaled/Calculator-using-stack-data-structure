<?php

namespace App\Classes;

class BracketsChecker
{
    protected string $value;

    public function __construct($value)
    {
        $this->value = $value;
        $this->check();
    }

    public function check()
    {
        $slack = new stack();
        $opening = ["[", "{", "("];
        $closing = ["]", "}", ")"];

        for ($i = 0, $counter = strlen($this->value); $i < $counter; $i++) {

            if (in_array($this->value[$i], $opening)) {

                $slack->push($this->value[$i]);

            } elseif (in_array($this->value[$i], $closing)) {

                if ($slack->isEmpty())
                    throw new \RuntimeException('Brackets Closing Early');

                $index = array_search($this->value[$i], $closing);

                if ($slack->top() !== $opening[$index]) {
                    throw new \RuntimeException('Brackets Not Close Probably');
                }

                $slack->pop();
            }

        }
        return ($slack->isEmpty()) ? TRUE : throw new \RuntimeException('Brackets Not Balanced');
    }
}