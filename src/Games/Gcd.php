<?php

namespace Brain\Games\Games\Gcd;

use CONST Brain\Games\Engine\ATTEMPTS;

const MESSAGE = 'Find the greatest common divisor of given numbers.';

function gcd($number1, $number2)
{
    return $number2 === 0 ? $number1 : gcd($number2, $number1 % $number2);
}


function start()
{
    $data = [];
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $number1 = mt_rand(1, 100);
        $number2 = mt_rand(1, 100);
        $data[$i][] = "{$number1} {$number2}";
        $data[$i][] = (string) gcd($number1, $number2);
    }
    \Brain\Games\Engine\run($data, MESSAGE);
}
