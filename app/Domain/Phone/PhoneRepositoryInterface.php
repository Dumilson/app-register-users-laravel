<?php
namespace App\Domain\Phone;

use App\Domain\Phone\Phone;

interface PhoneRepositoryInterface {
    public function save(Phone $phone) : void;
    public function getPhoneByUser(int $userId):  array;
}
