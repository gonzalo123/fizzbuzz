<?php

namespace FizzBuzz;

use FizzBuzz\Validators\ValidatorInterface;

class FizzBuzz
{
    private $inputRange;
    private $validators = [];

    public function __construct($inputRange)
    {
        $this->inputRange = $inputRange;
    }

    public function registerValidator(ValidatorInterface $validator)
    {
        $this->validators[] = $validator;
    }

    public function iterator()
    {
        foreach ($this->inputRange as $item) {
            yield $this->renderItemForValue($item);
        }
    }

    public function getOutput()
    {
        $output = [];
        foreach ($this->iterator() as $item) {
            $output[] = $item;
        }

        return $output;
    }

    private function renderItemForValue($item)
    {
        $out = [];
        foreach ($this->validators as $validator) {
            $validatorOut = $this->validateItemWithValidator($item, $validator);
            if (!is_null($validatorOut)) {
                $out[] = $validatorOut;
            }
        }

        return count($out) > 0 ? implode(null, $out) : $item;
    }

    private function validateItemWithValidator($item, ValidatorInterface $validator)
    {
        $validator->setItem($item);
        $validator->validate();

        return $validator->getOutput();
    }
}