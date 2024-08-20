<?php

namespace App\Repositories\Destinations;

use App\Http\Requests\DestinationRequest;
use App\interfaces\DestinationInterface;
use Illuminate\Http\Request;
use App\Models\Destinations;

class DestinationRepository implements DestinationInterface
{
    private $destination;

    function __construct()
    {
        $this->destination = new Destinations();
    }
    public function getDestinations()
    {
        $this->destination->get();
    }

    public function getDestinationById(Destinations $destination)
    {
        $this->destination->query()->find($destination);
    }

    public function createDestination($data)
    {
        $this->destination->create($data);
    }

    public function updateDestination($data, Destinations $destination)
    {
        $this->destination->query()->find($destination)->update($data);
    }

    public function deleteDestination(Destinations $destination)
    {
        $this->destination->query()->find($destination)->delete();
    }
    function getDestinationByCompany($company_id)
    {
        $this->destination->query()->where('destination_company_id', $company_id)->get();
    }
    function getDestinationByProvince($province_id)
    {
        $this->destination->query()->where('province_id', $province_id)->get();
    }
    function getDestinationByRegency($regency_id)
    {
        $this->destination->query()->where('regency_id', $regency_id)->get();
    }
    function getDestinationByDistrict($district_id)
    {
        $this->destination->query()->where('district_id', $district_id)->get();
    }
    function getDestinationByVillage($village_id)
    {
        $this->destination->query()->where('village_id', $village_id)->get();
    }
    function getDestinationByPrice($price)
    {
        $this->destination->query()->where('price', $price)->get();
    }
    function getDestinationByRating($rating)
    {
        $this->destination->query()->where('rating', $rating)->get();
    }
    function getDestinationByTestemonial($testemonial)
    {
        $this->destination->query()->where('testemonial', $testemonial)->get();
    }
    function getDestinationBySearch($search)
    {
        $this->destination->query()->where("name", "like", "%{$search}%")
            ->orWhere("province_id", "like", "%{$search}%")
            ->orWhere("regency_id", "like", "%{$search}%")
            ->orWhere("district_id", "like", "%{$search}%")
            ->orWhere("village_id", "like", "%{$search}%")
            ->orWhere("destination_company_id", "like", "%{$search}%")
            ->get();
    }
    //get destination by name, province,regency
    function getDestinationByFilter($name, $province, $regency)
    {
        $this->destination->query()->where("name", "like", "%{$name}%")
            ->where("province_id", "like", "%{$province}%")
            ->where("regency_id", "like", "%{$regency}%")
            ->get();
    }
}