<?php


namespace App\Classes;

class Stack
{
    protected $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function push($item)
    {
        array_unshift($this->stack, $item);
    }

    public function pop()
    {
        if ($this->isEmpty())
            throw new \Exception('Stack is Empty');

        return array_shift($this->stack);
    }

    public function top()
    {
        if ($this->isEmpty())
            throw new \Exception('Stack is Empty');

        return current($this->stack);
    }

    public function isEmpty()
    {
        return (count($this->stack) == 0) ? TRUE : FALSE ;
    }
}