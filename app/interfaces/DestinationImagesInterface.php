<?php

namespace App\Interfaces;

interface DestinationImagesInterface
{
    public function store($data);
    public function delete($destinationImages);
    public function getImageById($id);
}