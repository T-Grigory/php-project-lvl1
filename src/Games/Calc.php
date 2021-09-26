<?php

namespace Brain\Games\Games\Calc;

use Exception;

use CONST Brain\Games\Engine\ATTEMPTS;

const OPERATORS = ['+', '-', '*'];
const MESSAGE = 'Answer "yes" if the number is oven, otherwise answer "no".';


function getRandomOperator(): string
{
    return OPERATORS[mt_rand(0, count(OPERATORS) - 1)];
}

/**
 * @throws Exception
 */
function calculator(int $number1, int $number2, string $operator): int
{
    switch ($operator) {
        case '+':
            $expression = $number1 + $number2;
            break;
        case '-':
            $expression = $number1 - $number2;
            break;
        case '*':
            $expression = $number1 * $number2;
            break;
        default:
            throw new Exception("Unknown operator: '{$operator}'!");
    }
    return $expression;
}

function start(): void
{
    $data = [];
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $number1 = mt_rand(1, 100);
        $number2 = mt_rand(1, 100);
        $operator = getRandomOperator();
        $data[$i]["question"] = "{$number1} {$operator} {$number2}";
        try {
            $data[$i]["correctAnswer"] = (string) calculator($number1, $number2, $operator);
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
    \Brain\Games\Engine\run($data, MESSAGE);
}
