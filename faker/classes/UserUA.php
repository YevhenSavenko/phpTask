<?php

namespace classes;

use Faker\Factory;

class UserUA extends User
{

    public function __construct($codes)
    {
        $this->codes = $codes;
        $this->faker = Factory::create('uk_UA');
    }

    public function getNumber()
    {
        $num = rand(0, count($this->codes) - 1);

        return $this->faker->numerify("(+380){$this->codes[$num]}-###-##-##");
    }
}
