<?php

namespace App\Repositories\Guests;

use App\Interfaces\GuestInterface;
use App\Models\Guests;

class GuestRepository implements GuestInterface
{
    private Guests $model;
    public function __construct(Guests $guests)
    {
        $this->model = $guests;
    }

    public function getGuest()
    {
        return $this->model->query()->get();
    }

    public function countGuest()
    {
        return $this->model->query()->count();
    }

    public function getGuestById($id)
    {
        return $this->model->query()->findOrFail($id);
    }
}
