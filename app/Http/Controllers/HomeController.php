<?php

namespace App\Http\Controllers;

use App\Interfaces\DestinationInterface;
use App\Interfaces\TestemonialsInterface;
use Carbon\Carbon;
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

    function destinations(Request $request)
    {
        $province = $request->province;
        $regency = $request->regency;
        $name = $request->name;
        $data = [
            'destinations' => $this->destination->getDestinationByFilter($name, $province, $regency),
        ];
        return view('destinations', $data);
    }
    function viewDestination($destination)
    {
        $destination = $this->destination->getDestinationById($destination);
        $data = [
            'destination' => $destination,
            'testemonial' => $this->testemonial->getTestemonialByDestinationId($destination->id),
        ];
        if ($destination) {
            return view('view-destination', $data);
        } else {
            return redirect()->route('home')->with('error', 'Destination not found');
        }
    }
    function storeTestimony(Request $request, $destination)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'content' => $request->content,
            'destination_id' => $destination,
        ];
        $this->testemonial->storeTestimony($data);
        return back()->with('success', 'Testimony added');
    }
}