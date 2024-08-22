<?php

namespace App\Interfaces;

interface DestinationInterface
{
    public function getDestinations();

    public function countDestinations();

    public function getDestinationById($destination);

    public function createDestination($data);

    public function updateDestination($data, $destination);

    public function deleteDestination($destination);

    public function getDestinationByCompany($company_id);

    public function getDestinationByProvince($province_id);

    public function getDestinationByRegency($regency_id);

    public function getDestinationByDistrict($district_id);

    public function getDestinationByVillage($village_id);

    public function getDestinationByRating($rating);

    public function getDestinationByPrice($price);

    public function getDestinationByTestemonial($testemonial);

    public function getDestinationByFilter($name, $province, $regency);

    public function getDestinationBySearch($search);
}
