<?php
use FizzBuzz\Validators\Fizz;
use FizzBuzz\Validators\Buzz;
use FizzBuzz\Validators\ValidatorInterface;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function get_data_provider_validator()
    {
        return array(
            // Testing Fizz Validator
            ['when' => 1, 'returns' => null, 'validator' => new Fizz()],
            ['when' => 2, 'returns' => null, 'validator' => new Fizz()],
            ['when' => 3, 'returns' => 'Fizz', 'validator' => new Fizz()],
            ['when' => 4, 'returns' => null, 'validator' => new Fizz()],
            ['when' => 5, 'returns' => null, 'validator' => new Fizz()],
            ['when' => 6, 'returns' => 'Fizz', 'validator' => new Fizz()],
            ['when' => 7, 'returns' => null, 'validator' => new Fizz()],
            ['when' => 8, 'returns' => null, 'validator' => new Fizz()],
            ['when' => 9, 'returns' => 'Fizz', 'validator' => new Fizz()],
            ['when' => 10, 'returns' => null, 'validator' => new Fizz()],
            // Testing Buzz Validator
            ['when' => 1, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 2, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 3, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 4, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 5, 'returns' => 'Buzz', 'validator' => new Buzz()],
            ['when' => 6, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 7, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 8, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 9, 'returns' => null, 'validator' => new Buzz()],
            ['when' => 10, 'returns' => 'Buzz', 'validator' => new Buzz()],
        );
    }

    /** @dataProvider get_data_provider_validator */
    function test_validator($when, $returns, ValidatorInterface $validator)
    {
        $validator->setItem($when);

        $this->assertEquals(null, $validator->getOutput());

        $validator->validate();

        $this->assertEquals($returns, $validator->getOutput());
    }
}
