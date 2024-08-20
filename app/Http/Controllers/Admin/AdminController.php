<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DestinationInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $destination;
    function __construct(DestinationInterface $destination)
    {
        $this->destination = $destination;
    }

    function Dashboard()
    {
        $data = [
            'total_destinations' => $this->destination->countDestinations(),
        ];
        return view('dashboard.Dashboard', $data);
    }
}