<?php

namespace Brain\Games\Start\Game;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Even\isEven;

const ATTEMPTS = 3;

function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is oven, otherwise answer "no".');

    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $randomNumber = mt_rand(1, 100);
        line("Question: " . $randomNumber);
        $answer = prompt("Your answer: ");
        $correct = isEven($randomNumber) ? 'yes' : 'no';

        if ($answer !== $correct) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correct);
            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}