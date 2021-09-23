<?php

namespace Brain\Games\Games\Gcd;

use CONST Brain\Games\Engine\ATTEMPTS;

const MESSAGE = 'Find the greatest common divisor of given numbers.';

function gcd(int $number1, int $number2): int
{
    return $number2 === 0 ? $number1 : gcd($number2, $number1 % $number2);
}


function start(): void
{
    $data = [];
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $number1 = mt_rand(1, 100);
        $number2 = mt_rand(1, 100);
        $data[$i]['question'] = "{$number1} {$number2}";
        $data[$i]['correctAnswer'] = (string) gcd($number1, $number2);
    }
    \Brain\Games\Engine\run($data, MESSAGE);
}
