<?php

namespace App\Repositories\Destinations;

use App\Interfaces\DestinationInterface;
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
        return $this->destination->get();
    }

    public function getDestinationById(Destinations $destination)
    {
        return $this->destination->query()->find($destination);
    }

    public function createDestination($data)
    {
        return $this->destination->create($data);
    }

    public function updateDestination($data, Destinations $destination)
    {
        return $this->destination->query()->find($destination)->update($data);
    }

    public function deleteDestination(Destinations $destination)
    {
        return $this->destination->query()->find($destination)->delete();
    }
    function getDestinationByCompany($company_id)
    {
        return $this->destination->query()->where('destination_company_id', $company_id)->get();
    }
    function getDestinationByProvince($province_id)
    {
        return $this->destination->query()->where('province_id', $province_id)->get();
    }
    function getDestinationByRegency($regency_id)
    {
        return $this->destination->query()->where('regency_id', $regency_id)->get();
    }
    function getDestinationByDistrict($district_id)
    {
        return $this->destination->query()->where('district_id', $district_id)->get();
    }
    function getDestinationByVillage($village_id)
    {
        return $this->destination->query()->where('village_id', $village_id)->get();
    }
    function getDestinationByPrice($price)
    {
        return $this->destination->query()->where('price', $price)->get();
    }
    function getDestinationByRating($rating)
    {
        return $this->destination->query()->where('rating', $rating)->get();
    }
    function getDestinationByTestemonial($testemonial)
    {
        return $this->destination->query()->where('testemonial', $testemonial)->get();
    }
    function getDestinationBySearch($search)
    {
        return $this->destination->query()->where("name", "like", "%{$search}%")
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
        return $this->destination->query()->where("name", "like", "%{$name}%")
            ->where("province_id", "like", "%{$province}%")
            ->where("regency_id", "like", "%{$regency}%")
            ->get();
    }
    function countDestinations()
    {
        return $this->destination->query()->count();
    }
}