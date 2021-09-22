<?php

namespace Brain\Games\Games\Prime;

use const Brain\Games\Engine\ATTEMPTS;

const MESSAGE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number): bool
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}


function start()
{
    $data = [];
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $randomNumber = mt_rand(1, 100);
        $data[$i][] = (string) $randomNumber;
        $data[$i][] = isPrime($randomNumber) ? 'yes' : 'no';
    }
    \Brain\Games\Engine\run($data, MESSAGE);
}
