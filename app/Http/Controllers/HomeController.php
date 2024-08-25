<?php

namespace App\Http\Controllers;

use App\Interfaces\DestinationInterface;
use App\Interfaces\TestemonialsInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $destination;
    private $testemonial;
    function __construct(DestinationInterface $destination, TestemonialsInterface $testemonial)
    {
        $this->destination = $destination;
        $this->testemonial = $testemonial;
    }
    function index()
    {
        $data = [
            'destinations' => $this->destination->getDestinations(3),
            'testemonial' => $this->testemonial->getTestemonial(3),
        ];
        return view('welcome', $data);
    }

    function destinations()
    {
        $data = [
            'destinations' => $this->destination->getDestinations(),
        ];
        return view('destinations', $data);
    }
}