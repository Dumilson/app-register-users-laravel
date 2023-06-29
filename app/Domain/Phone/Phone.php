<?php
namespace App\Domain\Phone;
Class Phone {
    private $id;
    private $phone;
    private $userId;

    public function __construct($phone, $userId = null, $id = null)
    {
        $this->phone = $phone;
        $this->userId = $userId;
        $this->id = $id ?? null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
