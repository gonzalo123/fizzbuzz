<?php

namespace FizzBuzz\Validators;

class Buzz extends AbstractValidator implements ValidatorInterface
{
    const VALID_OUTPUT = 'Buzz';

    protected function isItemValid()
    {
        return $this->item % 5 == 0;
    }
}