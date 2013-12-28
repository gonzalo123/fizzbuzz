<?php

use FizzBuzz\FizzBuzz;
use FizzBuzz\Validators\Fizz;
use FizzBuzz\Validators\Buzz;

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    function test_fizz()
    {
        $fizzBuzz = new FizzBuzz(range(1, 10));
        $fizzBuzz->registerValidator(new Fizz());
        $expected = [1, 2, 'Fizz', 4, 5, 'Fizz', 7, 8, 'Fizz', 10];
        $this->assertEquals($expected, $fizzBuzz->getOutput());
    }

    function test_buzz()
    {
        $fizzBuzz = new FizzBuzz(range(1, 10));
        $fizzBuzz->registerValidator(new Buzz());
        $expected = [1, 2, 3, 4, 'Buzz', 6, 7, 8, 9, 'Buzz'];
        $this->assertEquals($expected, $fizzBuzz->getOutput());
    }

    function test_fizz_buzz()
    {
        $fizzBuzz = new FizzBuzz(range(1, 10));
        $fizzBuzz->registerValidator(new Fizz());
        $fizzBuzz->registerValidator(new Buzz());
        $expected = [1, 2, 'Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz'];
        $this->assertEquals($expected, $fizzBuzz->getOutput());
    }

    function test_fizz_buzz_with_both()
    {
        $fizzBuzz = new FizzBuzz(range(11, 20));
        $fizzBuzz->registerValidator(new Fizz());
        $fizzBuzz->registerValidator(new Buzz());
        $expected = [11, 'Fizz', 13, 14, 'FizzBuzz', 16, 17, 'Fizz', 19, 'Buzz'];
        $this->assertEquals($expected, $fizzBuzz->getOutput());
    }

}
