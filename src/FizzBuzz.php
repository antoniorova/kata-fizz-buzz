<?php

declare(strict_types=1);

namespace FizzBuzz;

use InvalidArgumentException;

class FizzBuzz
{
    public static function run(int $number): string
    {
        if (1 > $number || 100 < $number) {
            throw new InvalidArgumentException('The number must be between 1 to 100');
        }

        $output = '';

        if (0 === $number % 3) {
            $output .= 'Fizz';
        }

        if (0 === $number % 5) {
            $output .= 'Buzz';
        }

        return '' === $output ? (string)$number : $output;
    }
}
