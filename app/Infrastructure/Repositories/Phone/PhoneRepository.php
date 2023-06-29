<?php
namespace App\Infrastructure\Repositories\Phone;

use App\Domain\Phone\Phone;
use App\Domain\Phone\PhoneRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PhoneRepository implements PhoneRepositoryInterface

{
    public function save(Phone $phone) : void{
        $phoneId = DB::table('phones')->insertGetId([
            'phone_number' => $phone->getPhone(),
            'user_id' => $phone->getUserId(),
        ]);
        $phone->setId($phoneId);
    }

    public function getPhoneByUser(int $userId):  array{
        $phoneData = DB::table('phones')->where('user_id', $userId)->get();

        $phones = [];

        foreach ($phoneData as $phone) {
            $phones[] = new Phone($phone->phone_number);
        }

        return $phones;
    }
}
