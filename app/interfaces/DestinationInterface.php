<?php

namespace App\interfaces;

use App\Models\Destinations;
use Illuminate\Http\Request;

interface DestinationInterface
{
    public function getDestinations();
    public function getDestinationById(Destinations $destination);
    public function createDestination(Request $request);
    public function updateDestination(Request $request, Destinations $destination);
    public function deleteDestination(Destinations $destination);
}