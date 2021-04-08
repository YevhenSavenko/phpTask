<?php

namespace classes;

use Faker\Factory;

abstract class User
{
    protected $codes;
    protected $faker;

    public function __construct($codes)
    {
        $this->faker = Factory::create();
    }

    abstract public function getNumber();

    public function getInfo()
    {
        $address = str_replace("\n", ' ', $this->faker->address);

        echo "{$this->faker->name};{$address};{$this->getNumber()}" . PHP_EOL;
    }
}
