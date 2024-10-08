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

    public function getDestinations($limit = null)
    {
        return $this->destination
            ->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }

    public function getDestinationById($destination)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->find($destination);
    }

    public function createDestination($data)
    {
        return $this->destination->create($data);
    }

    public function updateDestination($data, $destination)
    {
        return $this->destination->query()->find($destination)->update($data);
    }

    public function deleteDestination($destination)
    {
        return $this->destination->query()->find($destination)->delete();
    }

    function getDestinationByCompany($company_id)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('destination_company_id', $company_id)->get();
    }

    function getDestinationByProvince($province_id)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('province_id', $province_id)->get();
    }

    function getDestinationByRegency($regency_id)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('regency_id', $regency_id)->get();
    }

    function getDestinationByDistrict($district_id)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('district_id', $district_id)->get();
    }

    function getDestinationByVillage($village_id)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('village_id', $village_id)->get();
    }

    function getDestinationByPrice($price)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('price', $price)->get();
    }

    function getDestinationByRating($rating)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('rating', $rating)->get();
    }

    function getDestinationByTestemonial($testemonial)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where('testemonial', $testemonial)->get();
    }

    function getDestinationBySearch($search)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where("name", "like", "%{$search}%")
            ->orWhere("province.name", "like", "%{$search}%")
            ->orWhere("regency.name", "like", "%{$search}%")
            ->orWhere("district.name", "like", "%{$search}%")
            ->orWhere("villages.name", "like", "%{$search}%")
            ->orWhere("destination_companies.name", "like", "%{$search}%")
            ->get();
    }

    //get destination by name, province,regency
    function getDestinationByFilter($name = null, $province = null, $regency = null)
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->where(function ($query) use ($name, $province, $regency) {
                if ($name) {
                    $query->where("name", "like", "%{$name}%");
                }
                if ($province) {
                    $query->orWhere("province_id", $province);
                }
                if ($regency) {
                    $query->orWhere("regency_id", $regency);
                }
            })
            ->orderBy('id', 'DESC')
            ->paginate(9);

    }

    function countDestinations()
    {
        return $this->destination->query()
            ->with(['company', 'images', 'province', 'regency', 'district', 'village'])
            ->count();
    }
}