<?php

namespace Brain\Games\Games\Calc;

use CONST Brain\Games\Engine\ATTEMPTS;

const OPERATORS = ['+', '-', '*'];
const MESSAGE = 'Answer "yes" if the number is oven, otherwise answer "no".';


function getRandomOperators(): string
{
    return OPERATORS[mt_rand(0, count(OPERATORS) - 1)];
}

function calculator($number1, $number2, $operator)
{
    switch ($operator) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}

function start()
{
    $data = [];
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $number1 = mt_rand(1, 100);
        $number2 = mt_rand(1, 100);
        $operator = getRandomOperators();
        $data[$i][] = "{$number1} {$operator} {$number2}";
        $data[$i][] = (string) calculator($number1, $number2, $operator);
    }
    \Brain\Games\Engine\run($data, MESSAGE);
}
