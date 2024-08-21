<?php

namespace App\Interfaces;

interface GuestInterface
{
    public function getGuest();

    public function countGuest();

    public function getGuestById($id);
}
