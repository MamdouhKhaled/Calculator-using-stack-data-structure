<?php


namespace App\Classes;


class Calculator
{
    protected $expression;
    public function __construct($value)
    {
        try {
            new BracketsChecker($value);
            $postfix = new Postfix($value);
            echo $this->expression =  $postfix->getExpression();
            echo $this->Evaluation();
        } catch (\Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

    }

    public function Evaluation() {
        $items = explode(" ", $this->expression);
        $stack = new Stack();
        foreach ($items as $item){
            if(is_numeric($item))
                $stack->push($item);
            else {
                $op2 = $stack->pop();
                $op1 = $stack->pop();
                $stack->push($this->oprations($op1, $op2, $item));
            }
        }
        return $stack->pop();
    }

    public function oprations($op1, $op2, $op)
    {
        switch ($op)
        {
            case "+":
                return $op1 + $op2;
            case "-":
                return $op1 - $op2;
            case "*":
                return $op1 * $op2;
            case "/":
                return $op1 / $op2;
            case "^":
                return $op1 ^ $op2;
            default:
                throw new \Exception('Unexpected value');
        }
    }
}