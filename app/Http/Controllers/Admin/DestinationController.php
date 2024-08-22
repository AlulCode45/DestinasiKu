<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DestinationInterface;
use App\Models\Destinations;

class DestinationController extends Controller
{
    private $destination;

    function __construct(DestinationInterface $destination)
    {
        $this->destination = $destination;
    }

    public function index()
    {
        $data = [
            'destinations' => $this->destination->getDestinations()
        ];
        return view('dashboard.destinations.destination', $data);
    }

    public function show($destination)
    {
        $data = [
            'destination' => $this->destination->getDestinationById($destination)
        ];
        return view('dashboard.destinations.view-destination', $data);
    }

    public function delete(Destinations $destination)
    {
        if ($this->destination->deleteDestination($destination)) {
            return back()->with('success', 'Destinasi Berhasil Dihapus');
        }

    }
}
