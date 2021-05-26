<?php

namespace Models;

use Core\Model;

class AddSeller extends Model
{

    public function checkPostData()
    {
        if (isset($_POST['seller-add'])) {
            $nameSeller = filter_input(INPUT_POST, 'seller-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $citySeller = filter_input(INPUT_POST, 'seller-city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $commisionSeller = filter_var(filter_input(INPUT_POST, 'seller-commision', FILTER_SANITIZE_FULL_SPECIAL_CHARS), FILTER_VALIDATE_FLOAT);

            if (strlen($nameSeller) > 2  && strlen($citySeller) > 2 && $commisionSeller > 0) {
                return ['name' => $nameSeller, 'city' => $citySeller, 'commision' => $commisionSeller];
            }
        }
    }
}
