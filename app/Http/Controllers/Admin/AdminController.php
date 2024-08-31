<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DestinationInterface;
use App\Interfaces\GuestInterface;
use App\Interfaces\RatingsInterface;
use App\Interfaces\TestemonialsInterface;

class AdminController extends Controller
{
    private $destination;
    private $guest;
    private $ratings;
    private $testemonials;

    function __construct(DestinationInterface $destination, GuestInterface $guest, RatingsInterface $ratings, TestemonialsInterface $testemonials)
    {
        $this->destination = $destination;
        $this->guest = $guest;
        $this->ratings = $ratings;
        $this->testemonials = $testemonials;
    }

    public function Dashboard()
    {
        $data = [
            'total_destinations' => $this->destination->countDestinations(),
            'total_guests' => $this->guest->countGuest(),
            'ratings' => $this->ratings->getRatings(),
            'testemonials' => $this->testemonials->countTestemonial(),
        ];
        return view('dashboard.Dashboard', $data);
    }
}