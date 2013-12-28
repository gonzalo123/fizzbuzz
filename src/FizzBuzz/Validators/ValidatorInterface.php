<?php

namespace FizzBuzz\Validators;

interface ValidatorInterface
{
    public function setItem($item);

    public function validate();

    public function getOutput();
}