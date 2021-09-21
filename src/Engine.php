<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Games\Even\isEven;

const ATTEMPTS = 3;

function run($data, $message)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($message);

    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $question = $data[$i][0];
        $correct = $data[$i][1];
        line("Question: " . $question);
        $answer = prompt("Your answer: ");

        if ($answer !== $correct) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correct);
            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}
