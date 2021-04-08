<?php

namespace classes;

use Faker\Factory;

class UserRU extends User
{

    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');
    }

    public function getNumber()
    {
        return $this->faker->numerify("+(7)9##-###-##-##");
    }
}
