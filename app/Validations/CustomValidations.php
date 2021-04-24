<?php namespace App\Validations;

use DateTime;

class CustomValidations
{
    public function valid_birthday_date(string $str):bool {
        $dob = DateTime::createFromFormat("d/m/Y", $str);
        $now = new DateTime();
        if ($dob > $now)
        {
            return false;
        }

        return true;
    }

    public function valid_reservation_date(string $str):bool {
        $dob = DateTime::createFromFormat("d/m/Y", $str);
        $now = new DateTime();
        if ($now > $dob)
        {
            return false;
        }

        return true;
    }
}