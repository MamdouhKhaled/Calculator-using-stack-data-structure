<?php


namespace App\Classes;


class Postfix
{
    protected string $value;
    protected $stack;
    protected $output = "";

    public function __construct($value)
    {
        $this->stack = new Stack();
        $this->value = $value;
        $this->convToPostFix();
    }

    public function getExpression()
    {
        return $this->output;
    }

    public function convToPostFix()
    {
        for ($i = 0, $len = strlen($this->value); $i < $len; $i++) {
            if ($this->value[$i] == " ")
                continue;

            if (is_numeric($this->value[$i]))
                $this->output .= $this->value[$i];
            elseif ($this->value[$i] == "(") {
                $this->stack->push($this->value[$i]);
            }
            elseif ($this->value[$i] == ")") {
                while ($this->stack->top() != "(") {
                    $this->output .= " ".$this->stack->pop();
                }
                $this->stack->pop();
            }else {
                while (!$this->stack->isEmpty() && $this->Priority($this->value[$i]) <= $this->Priority($this->stack->top()))
                {
                    $this->output .= " ".$this->stack->pop();
                }
                $this->stack->push($this->value[$i]);
                $this->output .= " ";
            }
        }
        while (!$this->stack->isEmpty()){

            $this->output .= " ".$this->stack->pop();
        }
    }

    public function Priority($operator)
    {
        if ($operator == '-' || $operator == '+')
            return 1;
        else if ($operator == '*' || $operator == '/')
            return 2;
        else if ($operator == '^')
            return 3;
        else
            return 0;
    }

}