<?php

namespace FizzBuzz\Validators;

class Fizz extends AbstractValidator implements ValidatorInterface
{
    const VALID_OUTPUT = 'Fizz';

    protected function isItemValid()
    {
        return $this->item % 3 == 0;
    }
}