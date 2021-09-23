<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ATTEMPTS = 3;

function run($data, $message)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($message);

    for ($i = 1; $i <= ATTEMPTS; $i++) {
        $question = $data[$i]["question"];
        $correct = $data[$i]["correctAnswer"];
        line("Question: $question");
        $answer = prompt("Your answer");

        if ($answer !== $correct) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correct);
            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}
