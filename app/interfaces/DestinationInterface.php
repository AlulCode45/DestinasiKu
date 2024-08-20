<?php

namespace App\Interfaces;

use App\Models\Destinations;
use Illuminate\Http\Request;

interface DestinationInterface
{
    public function getDestinations();
    public function countDestinations();
    public function getDestinationById(Destinations $destination);
    public function createDestination(Request $request);
    public function updateDestination(Request $request, Destinations $destination);
    public function deleteDestination(Destinations $destination);
    public function getDestinationByCompany($company_id);
    public function getDestinationByProvince($province_id);
    public function getDestinationByRegency($regency_id);
    public function getDestinationByDistrict($district_id);
    public function getDestinationByVillage($village_id);
    public function getDestinationByRating($rating);
    public function getDestinationByPrice($price);
    public function getDestinationByTestemonial($testemonial);
    public function getDestinationByFilter($name, $province, $regency);
}