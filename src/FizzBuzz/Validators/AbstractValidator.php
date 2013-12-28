<?php

namespace FizzBuzz\Validators;

abstract class AbstractValidator implements ValidatorInterface
{
    const VALID_OUTPUT = '';

    protected $item;
    protected $output;

    public function setItem($item)
    {
        $this->item   = $item;
        $this->output = null;
    }

    public function validate()
    {
        if ($this->isItemValid()) {
            $this->output = static::VALID_OUTPUT;
        }
    }

    public function getOutput()
    {
        return $this->output;
    }

    protected function isItemValid()
    {
        return false;
    }
}