<?php

namespace Brain\Games\Games\Progression;

use CONST Brain\Games\Engine\ATTEMPTS;

const MESSAGE = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function getProgression($start, $step, $length): array
{
    $progression = [];
    for ($i = $start; $i < $start + $length * $step; $i += $step) {
        $progression[] = $i;
    }
    return $progression;
}

function start()
{
    $data = [];
    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $start = mt_rand(1, 100);
        $step = mt_rand(1, 10);
        $positionOfTheMissingNumber = mt_rand(0, PROGRESSION_LENGTH - 1);
        $progression = getProgression($start, $step, PROGRESSION_LENGTH);
        $missingNumber = $progression[$positionOfTheMissingNumber];
        $progression[$positionOfTheMissingNumber] = '..';
        $data[$i]['question'] = implode(' ', $progression);
        $data[$i]['correctAnswer'] = (string) $missingNumber;
    }
    \Brain\Games\Engine\run($data, MESSAGE);
}
