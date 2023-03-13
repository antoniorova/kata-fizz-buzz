<?php

declare(strict_types=1);

namespace FizzBuzz\Tests;

use FizzBuzz\FizzBuzz;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testThrowExceptionWithNumbersBelowOne(): void
    {
        $this->expectException(InvalidArgumentException::class);

        FizzBuzz::run(0);
    }

    public function testThrowExceptionWithNumbersGreaterThanOneHundred(): void
    {
        $this->expectException(InvalidArgumentException::class);

        FizzBuzz::run(101);
    }

    public function testFizzBuzzReturnTheNumberItselfAsString(): void
    {
        $this->assertEquals('7', FizzBuzz::run(7));
    }

    public function testForMultiplesOfThreeReturnFizzInsteadOfTheNumber(): void
    {
        foreach ([3, 6, 9] as $number) {
            $this->assertEquals('Fizz', FizzBuzz::run($number));
        }
    }

    public function testForTheMultiplesOfFiveReturnBuzzInsteadOfTheNumber(): void
    {
        foreach ([5, 10, 20] as $number) {
            $this->assertEquals('Buzz', FizzBuzz::run($number));
        }
    }

    public function testForNumbersWhichAreMultiplesOfBothThreeAndFiveReturnFizzBuzzInsteadOfTheNumber(): void
    {
        foreach ([15, 30, 45] as $number) {
            $this->assertEquals('FizzBuzz', FizzBuzz::run($number));
        }
    }

    public function testFullFizzBuzz(): void
    {
        for ($number = 1; $number <= 100; $number++) {
            $result = FizzBuzz::run($number);
            if (0 === $number % 3 && 0 === $number % 5) {
                $this->assertEquals('FizzBuzz', $result);
                continue;
            }
            if (0 === $number % 3) {
                $this->assertEquals('Fizz', $result);
                continue;
            }

            if (0 === $number % 5) {
                $this->assertEquals('Buzz', $result);
                continue;
            }

            $this->assertEquals($number, $result);
        }
    }
}