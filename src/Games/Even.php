<?php

namespace Brain\Games\Games\Even;

use CONST Brain\Games\Engine\ATTEMPTS;

const MESSAGE = 'Answer "yes" if the number is oven, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}


function start(): void
{
    $data = [];
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $randomNumber = mt_rand(1, 100);
        $data[$i]['question'] = (string) $randomNumber;
        $data[$i]['correctAnswer'] = isEven($randomNumber) ? 'yes' : 'no';
    }
    \Brain\Games\Engine\run($data, MESSAGE);
}
