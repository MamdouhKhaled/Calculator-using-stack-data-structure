<?php
require_once("./vendor/autoload.php");

use \App\Classes\Calculator;

$value = "( (25+25) + 10 ) / 30 ";
$value2 = "{)";
$value3 = "(3+2)+7/2*((7+3)*2)";
$value4 = "13+8/2-5";

$calculator = new Calculator($value);
