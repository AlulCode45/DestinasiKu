<?php

namespace App\Http\Controllers;

use App\Interfaces\DestinationInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $destination;
    function __construct(DestinationInterface $destination)
    {
        $this->destination = $destination;
    }
    function index()
    {
        $data = [
            'destination' => $this->destination->getDestinations(3)
        ];
        return view('welcome', $data);
    }
}