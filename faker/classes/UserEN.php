<?php


namespace classes;

use Faker\Factory;


class UserEN extends User
{

    public function __construct()
    {
        $this->faker = Factory::create('en_US');
    }

    public function getNumber()
    {
        return $this->faker->numerify("+1##-###-####");
    }
}
