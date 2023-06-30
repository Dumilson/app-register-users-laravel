<?php
namespace App\Application\Services\Phone;

use App\Domain\Phone\Phone;
use App\Domain\Phone\PhoneRepositoryInterface;

class PhoneService {
    private $phoneRepository;

    public function __construct(PhoneRepositoryInterface $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    public function createPhone(string $phone, int $userId): Phone
    {
        $phone = new Phone($phone, $userId);

        $this->phoneRepository->save($phone);

        return $phone;
    }


    public function getPhones(int $userId): array {
        return $this->phoneRepository->getPhoneByUser($userId);
    }
}
