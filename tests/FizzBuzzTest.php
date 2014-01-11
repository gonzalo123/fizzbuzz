<?php

use FizzBuzz\FizzBuzz;
use FizzBuzz\Validators\Fizz;
use FizzBuzz\Validators\Buzz;

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider  dataProvider */
    public function test_fizzbuzz(FizzBuzz $fizzBuzz, array $expected)
    {
        $this->doAsserts($fizzBuzz, $expected);
    }

    public function dataProvider()
    {
        return [
            'fizz'          => ['fizzBuzz' => $this->getFizzBuzz_Fizz(range(1, 10)), 'expected' => [1, 2, 'Fizz', 4, 5, 'Fizz', 7, 8, 'Fizz', 10]],
            'buzz'          => ['fizzBuzz' => $this->getFizzBuzz_Buzz(range(1, 10)), 'expected' => [1, 2, 3, 4, 'Buzz', 6, 7, 8, 9, 'Buzz']],
            'fizzBuzz'      => ['fizzBuzz' => $this->getFizzBuzz_FizzBuzz(range(1, 10)), 'expected' => [1, 2, 'Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz']],
            'fizzBuzz both' => ['fizzBuzz' => $this->getFizzBuzz_FizzBuzz(range(11, 20)), 'expected' => [11, 'Fizz', 13, 14, 'FizzBuzz', 16, 17, 'Fizz', 19, 'Buzz']],
        ];
    }

    protected function getFizzBuzz_Fizz($range)
    {
        $fizzBuzz = new FizzBuzz($range);
        $fizzBuzz->registerValidator(new Fizz());

        return $fizzBuzz;
    }

    protected function getFizzBuzz_Buzz($range)
    {
        $fizzBuzz = new FizzBuzz($range);
        $fizzBuzz->registerValidator(new Buzz());

        return $fizzBuzz;
    }

    protected function getFizzBuzz_FizzBuzz($range)
    {
        $fizzBuzz = new FizzBuzz($range);
        $fizzBuzz->registerValidator(new Fizz());
        $fizzBuzz->registerValidator(new Buzz());

        return $fizzBuzz;
    }

    protected function doAsserts(FizzBuzz $fizzBuzz, array $expected)
    {
        $i = 0;
        foreach ($fizzBuzz->iterator() as $item) {
            $this->assertEquals($expected[$i], $item);
            $i++;
        }

        $this->assertEquals($expected, $fizzBuzz->getOutput());
    }

}
